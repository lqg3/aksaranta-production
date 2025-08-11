@props(['quizzes', 'course_id', 'lesson_id', 'lesson_part_id'])

@php
    $quizzes = is_string($quizzes) ? json_decode($quizzes, true) : $quizzes;
@endphp

<div x-data="quizComponent({
    quizzes: @js($quizzes),
    courseId: @json($course_id),
    lessonId: @json($lesson_id),
    lessonPartId: @json($lesson_part_id)
})" class="space-y-8 bg-bg-dark min-h-screen p-6 text-text-primary">

    <template x-if="quizzes.length === 0">
        <p class="text-center text-gray-400 text-lg">Tidak ada quiz untuk bagian ini.</p>
    </template>

    <template x-if="quizzes.length > 0">
        <template x-for="(quiz, index) in quizzes" :key="index">
            <div class="relative p-6 border border-bg-card shadow rounded-lg"
                :class="hasSubmitted
                    ?
                    (getQuizFeedback(index).correct ? 'border-green-700' : 'border-red-600') :
                    ''">
                <!-- Top-right status label -->
                <template x-if="hasSubmitted">
                    <div class="absolute top-2 right-2 px-2 py-1 text-xs font-semibold rounded"
                        :class="getQuizFeedback(index).correct ? 'bg-green-700 text-green-100' : 'bg-red-600 text-red-100'"
                        x-text="getQuizFeedback(index).correct ? 'Correct' : 'Wrong'"></div>
                </template>

                <h3 class="font-bold text-lg mb-4" x-text="quiz.quiz_content.question"></h3>

                <!-- Multiple Choice -->
                <template x-if="quiz.quiz_type === 'multiple_choice'">
                    <div>
                        <template x-for="(option, optIndex) in quiz.quiz_content.options" :key="optIndex">
                            <button @click="selectOption(index, optIndex)" type="button" :disabled="hasSubmitted"
                                class="block w-full text-left px-4 py-2 mb-2 border rounded transition"
                                :class="{
                                    'bg-green-700 border-green-700 text-white': hasSubmitted && getQuizFeedback(index)
                                        .correctAnswer === option.option_text,
                                    'bg-red-700 border-red-500 text-white': hasSubmitted && quiz.selectedOption ===
                                        optIndex && getQuizFeedback(index).correctAnswer !== option.option_text,
                                    'border-2 border-red-800 bg-white/10 text-white': !hasSubmitted && quiz
                                        .selectedOption === optIndex,
                                    'border-white/20': !hasSubmitted && quiz.selectedOption !== optIndex,
                                    'hover:bg-white/10': !hasSubmitted
                                }"
                                x-text="option.option_text"></button>
                        </template>
                    </div>
                </template>

                <!-- Drag and Drop -->
                <template x-if="quiz.quiz_type === 'drag_and_drop'">
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Left side: Available items -->
                        <div class="space-y-3 border border-white/30 rounded-lg p-4 bg-white/5 min-h-[200px]"
                            @dragover.prevent="!hasSubmitted"
                            @drop="hasSubmitted ? null : dropBackToLeft(index, $event)">
                            <template x-for="item in getAvailableItems(index)" :key="item">
                                <div draggable="true"
                                    @dragstart="hasSubmitted ? $event.preventDefault() : dragItem(index, item, null)"
                                    class="cursor-move rounded-lg bg-white/10 border border-white/10 text-text-primary px-4 py-3 shadow-sm select-none
                        hover:bg-white/50 hover:text-black transition ease-in-out duration-200"
                                    x-text="item" title="Drag ke target jawaban"></div>
                            </template>
                        </div>

                        <!-- Right side: Targets -->
                        <div class="space-y-3">
                            <template x-for="target in quiz.targetsShuffled" :key="target">
                                <div @dragover.prevent="!hasSubmitted"
                                    @drop="hasSubmitted ? null : dropItem(index, target)"
                                    class="flex items-center justify-center h-12 rounded-lg border-2 border-dashed text-text-primary select-none text-sm font-medium transition-colors duration-200 cursor-pointer"
                                    :class="{
                                        'border-white/20 bg-white/20': quiz.droppedPairs[target],
                                        'border-white/10 bg-white/5': !quiz.droppedPairs[target],
                                        'bg-white/30 border-white/40': getQuizFeedback(index).pairFeedback &&
                                            getQuizFeedback(index).pairFeedback[target] === true,
                                        'bg-red-700 border-red-500': getQuizFeedback(index).pairFeedback &&
                                            getQuizFeedback(index).pairFeedback[target] === false
                                    }"
                                    :title="quiz.droppedPairs[target] ? 'Drag this item to reassign or remove' : 'Drop here'">
                                    <template x-if="quiz.droppedPairs[target]">
                                        <div draggable="true"
                                            @dragstart="hasSubmitted ? $event.preventDefault() : dragItem(index, quiz.droppedPairs[target], target)"
                                            class="cursor-move select-none w-full h-full flex items-center justify-center"
                                            x-text="quiz.droppedPairs[target]"
                                            title="Drag this item to another target or back to left side"></div>
                                    </template>
                                    <template x-if="!quiz.droppedPairs[target]">
                                        <span x-text="target"></span>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

                <!-- Fill in the Blank -->
                <template x-if="quiz.quiz_type === 'fill_in_the_blank'">
                    <div class="flex flex-col space-y-3 max-w-md">
                        <input type="text" x-model="quiz.userAnswer" :disabled="hasSubmitted"
                            placeholder="Type your answer..."
                            :class="{
                                'bg-green-700 border-green-500 text-white placeholder-gray-300': hasSubmitted &&
                                    getQuizFeedback(index).correct,
                                'bg-red-700 border-red-500 text-white placeholder-gray-300': hasSubmitted && !
                                    getQuizFeedback(index).correct,
                                'bg-white/10 border-white/20 text-text-primary placeholder-gray-500': !hasSubmitted
                            }"
                            class="rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800 transition duration-200" />
                    </div>
                </template>

                <!-- Show correct answer after submission -->
                <template x-if="feedback.length > 0">
                    <div class="mt-4 p-4 bg-white/10 rounded border border-white/10 text-sm text-text-secondary">
                        <template x-if="quiz.quiz_type === 'multiple_choice'">
                            <div><strong>Jawaban yang benar:</strong> <span
                                    x-text="getQuizFeedback(index).correctAnswer"></span></div>
                        </template>
                        <template x-if="quiz.quiz_type === 'drag_and_drop'">
                            <div>
                                <strong>Pasangan yang benar:</strong>
                                <ul class="list-disc ml-5 mt-1">
                                    <template x-for="pair in getQuizFeedback(index).correctAnswer"
                                        :key="pair.target">
                                        <li><span x-text="pair.item"></span> → <span x-text="pair.target"></span></li>
                                    </template>
                                </ul>
                            </div>
                        </template>
                        <template x-if="quiz.quiz_type === 'fill_in_the_blank'">
                            <div><strong>Jawaban yang benar:</strong> <span
                                    x-text="getQuizFeedback(index).correctAnswer"></span></div>
                        </template>
                    </div>
                </template>
            </div>
        </template>

        <!-- IMPORTANT: Wrap submit button in a real element like div -->
    </template>

    
    @if (!empty($quizzes) && count($quizzes) > 0)
        <div class="mt-6 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div class="flex space-x-4 justify-center md:justify-start">
                <button @click="submitAll()" :disabled="hasSubmitted"
                    class="px-6 py-3 bg-red-800 text-white rounded-lg hover:bg-red-700 transition disabled:opacity-50 disabled:cursor-not-allowed">
                    Cek
                </button>

                <button x-show="hasSubmitted" @click="resetQuiz()" type="button"
                    class="px-6 py-3 bg-red-800 text-white rounded-lg hover:bg-red-700 transition">
                    Coba lagi
                </button>
            </div>

            <template x-if="hasSubmitted">
                <div
                    class="self-end md:self-auto bg-red-800 text-white px-4 py-2 rounded shadow-lg font-semibold text-lg max-w-max mx-auto md:mx-0">
                    Skor: <span x-text="calculateScore()"></span>%
                </div>
            </template>
        </div>
    @endif

</div>



<script>
    function quizComponent({
        quizzes,
        courseId,
        lessonId,
        lessonPartId
    }) {
        return {
            quizzes: quizzes.map(q => {
                if (q.quiz_type === 'drag_and_drop') {
                    const items = q.quiz_content.items ?? [];
                    const targets = q.quiz_content.targets ?? [];
                    return {
                        ...q,
                        selectedOption: null,
                        userAnswer: '',
                        droppedPairs: {},
                        itemsShuffled: shuffleArray(items),
                        targetsShuffled: shuffleArray(targets),
                    };
                }
                return {
                    ...q,
                    selectedOption: null,
                    userAnswer: '',
                };
            }),

            draggedItem: null,
            draggedQuizIndex: null,
            draggedFromTarget: null,

            feedback: [],
            hasSubmitted: false, // NEW: track if user submitted

            selectOption(qIndex, optIndex) {
                if (this.hasSubmitted) return; // disable after submit
                this.quizzes[qIndex].selectedOption = optIndex;
            },

            dragItem(qIndex, item, fromTarget) {
                if (this.hasSubmitted) return; // disable after submit
                this.draggedItem = item;
                this.draggedQuizIndex = qIndex;
                this.draggedFromTarget = fromTarget;
            },

            dropItem(qIndex, target) {
                if (this.hasSubmitted) return; // disable after submit
                if (qIndex !== this.draggedQuizIndex) return;
                let quiz = this.quizzes[qIndex];
                if (this.draggedFromTarget !== null) {
                    delete quiz.droppedPairs[this.draggedFromTarget];
                }
                quiz.droppedPairs[target] = this.draggedItem;
            },

            dropBackToLeft(qIndex, event) {
                if (this.hasSubmitted) return; // disable after submit
                if (qIndex !== this.draggedQuizIndex) return;
                let quiz = this.quizzes[qIndex];
                if (this.draggedFromTarget !== null) {
                    delete quiz.droppedPairs[this.draggedFromTarget];
                }
            },

            getAvailableItems(qIndex) {
                let quiz = this.quizzes[qIndex];
                let assignedItems = Object.values(quiz.droppedPairs);
                return quiz.itemsShuffled.filter(item => !assignedItems.includes(item));
            },

            getQuizFeedback(index) {
                return this.feedback.find(f => f.quizIndex === index) || {};
            },



            submitAll() {
                if (this.hasSubmitted) return; // Prevent multiple submits

                const userAnswers = this.quizzes.map((quiz, index) => {
                    if (quiz.quiz_type === 'multiple_choice') {
                        return {
                            quizIndex: index,
                            answer: quiz.selectedOption,
                        };
                    }
                    if (quiz.quiz_type === 'drag_and_drop') {
                        return {
                            quizIndex: index,
                            answer: quiz.droppedPairs,
                        };
                    }
                    if (quiz.quiz_type === 'fill_in_the_blank') {
                        return {
                            quizIndex: index,
                            answer: quiz.userAnswer.trim(),
                        };
                    }
                    return {
                        quizIndex: index,
                        answer: null,
                    };
                });

                const url = `/learn/${courseId}/${lessonId}/${lessonPartId}/quiz`;

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                        },
                        body: JSON.stringify({
                            answers: userAnswers
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            this.feedback = data.feedback;
                            this.hasSubmitted = true;
                        } else {
                            console.error('Error: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting quiz:', error);
                        alert('Failed to submit quiz.');
                    });
            },

            resetQuiz() {
                this.hasSubmitted = false;

                // Reset answers for each quiz item
                this.quizzes.forEach(quiz => {
                    if (quiz.quiz_type === 'multiple_choice') {
                        quiz.selectedOption = null;
                    } else if (quiz.quiz_type === 'drag_and_drop') {
                        quiz.droppedPairs = {};
                    } else if (quiz.quiz_type === 'fill_in_the_blank') {
                        quiz.userAnswer = '';
                    }
                });

                // Clear feedback if you store it in the component
                if (this.feedback) {
                    this.feedback = [];
                }
            },

            calculateScore() {
                if (!this.hasSubmitted) return 0;
                // Assuming you have feedback array with correct boolean for each quiz
                let correctCount = this.feedback.filter(fb => fb.correct).length;
                let total = this.quizzes.length;
                return total > 0 ? Math.round((correctCount / total) * 100) : 0;
            }

        };
    }


    function shuffleArray(array) {
        let arr = array.slice();
        for (let i = arr.length - 1; i > 0; i--) {
            let j = Math.floor(Math.random() * (i + 1));
            [arr[i], arr[j]] = [arr[j], arr[i]];
        }
        return arr;
    }
</script>
