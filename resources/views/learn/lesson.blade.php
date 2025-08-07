<x-lesson-layout :course="$course" :lessonName="$lessonName">


    <!-- Default to first lesson ever, upon click move div to another component. -->

    <div x-data="{ videoLoaded: false }" class="w-full">
        <div x-show="activeTab === 'video'" 
             x-transition:enter="transition ease-out duration-600"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-600"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="w-full" id="video">
            <template x-if="!videoLoaded">
                <div class="w-full aspect-video flex items-center justify-center bg-bg-card bg-opacity-20 rounded-lg">
                </div>
            </template>
            <iframe x-show="videoLoaded" x-transition:enter="transition ease-in duration-600"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="w-full aspect-video border-none rounded-lg"
                src="https://www.youtube.com/embed/{{ $lessonParts[0]->part_video_url }}" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" enablejsapi=1 allowfullscreen @load="videoLoaded = true" id="youtube-iframe"></iframe>
        </div>

        <!-- Notes tab -->
        <div x-show="activeTab === 'notes'" 
             x-transition:enter="transition ease-out duration-600"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-600"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             id="notes">
            <h1 class="text-8xl">Lorem ipsum dolor sit amet.</h1>
            <p class="text-lg mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum quo eveniet, deleniti
                dolore incidunt molestiae ea, reiciendis qui adipisci sed libero rem eum, expedita quas dolorem dolores
                repudiandae tenetur debitis itaque culpa rerum veritatis. Veritatis beatae non expedita quasi quis
                impedit! Nobis suscipit saepe quam sit cupiditate mollitia voluptates rerum?</p>
            <p class="text-lg mt-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias repudiandae ducimus
                voluptatem illo amet? Explicabo aut ex facere unde. Debitis consequatur officia atque velit, itaque,
                saepe suscipit facere accusamus expedita et, recusandae ratione? Minus mollitia alias autem maiores
                veniam nam deleniti quaerat tempore fugit voluptates. Sed, esse eum pariatur perspiciatis dolorem
                repudiandae et debitis dolor provident praesentium recusandae, beatae, eligendi numquam asperiores odio
                ut tempora eos dolorum non? Nihil quae, facilis accusamus praesentium esse dolor soluta, veniam iusto
                quod minima alias nisi nesciunt eos optio deserunt id. Commodi ducimus id cupiditate porro blanditiis
                illo quidem quam repellendus iure, recusandae cum magnam praesentium facilis voluptatum autem non
                accusamus. Quas maxime laboriosam neque deserunt consectetur ipsum amet deleniti optio magni, sit atque
                praesentium at officia, vero minus illo esse maiores beatae voluptas. Facere pariatur quo soluta,
                veritatis commodi repudiandae. Nesciunt, earum? Incidunt expedita, earum sapiente veniam rem nostrum.
                Facere excepturi laudantium nostrum dolor facilis nam dicta id nulla eveniet modi! Deserunt, ullam
                quisquam inventore magnam nesciunt id quaerat deleniti expedita modi aspernatur sint magni officiis
                provident, culpa, consequuntur distinctio nihil! Blanditiis impedit minima voluptate ducimus et nisi
                quibusdam unde. Nobis maxime cum praesentium itaque facilis obcaecati magnam cupiditate vero officia,
                aliquid fugit quisquam pariatur, in ipsum officiis voluptatum consequatur deserunt. Dolorum voluptas
                quia totam similique, ea libero nemo, quod impedit, sit nisi velit soluta asperiores eligendi! Fugiat
                impedit aliquid soluta asperiores nisi sapiente, rerum eius blanditiis assumenda porro laboriosam
                voluptate, at nulla praesentium est similique! Quam quibusdam reprehenderit, fugit, ullam dolorem porro
                sunt sed a eveniet ad recusandae sequi asperiores placeat laboriosam soluta veniam obcaecati similique
                in necessitatibus nulla, velit hic quaerat. Laborum consequuntur debitis molestiae aliquid cumque! Quas,
                cupiditate? Deserunt rerum nostrum debitis laboriosam dignissimos, dolor, quis necessitatibus in, cum
                assumenda beatae molestiae exercitationem molestias pariatur et quas mollitia repellendus! Natus, nihil
                vel fugiat eos dolorum provident accusantium tempore consequuntur sapiente quis voluptate repellat,
                doloremque error similique officia qui veniam molestias soluta animi ipsa aperiam exercitationem quos
                sequi facere! Maiores sapiente et eos ut nobis facere totam a, iusto veritatis eius suscipit? Doloribus
                unde aspernatur ipsa et porro quidem aliquam? Asperiores, hic sunt fuga odit minima, saepe explicabo
                maiores repellendus, assumenda eveniet harum earum esse! Qui, eligendi voluptatibus? Libero, vitae.
                Laboriosam vitae nesciunt nobis consectetur voluptas sint debitis quae, quaerat similique ducimus
                itaque, quo odit accusamus autem adipisci eaque fugiat rem, modi aperiam minus doloribus nihil. Hic
                quasi quos corporis vel rem cumque libero eos natus? Deserunt praesentium, maiores nemo voluptate
                officiis eveniet dolore reiciendis molestias dignissimos est. Illum, maiores rem corporis, magnam porro
                et laborum dignissimos atque natus ea assumenda nesciunt eos beatae ipsa neque autem similique facilis,
                officia iste! Ullam quis laboriosam esse? Veniam, placeat earum. Minima deserunt enim et, odio nulla
                sunt vero doloremque quos quasi aspernatur cum dolorem veniam earum vel eum, deleniti libero repellendus
                unde? Eos tempora quaerat, culpa debitis a quae excepturi, pariatur ea perspiciatis commodi autem
                suscipit aliquam at accusantium aperiam! Culpa animi possimus, consequatur nemo, beatae facilis dolorem
                quae expedita nostrum architecto odit.</p>
        </div>

        <!-- Quiz tab -->
        <div x-show="activeTab === 'quiz'" 
             x-transition:enter="transition ease-out duration-600"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-600"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             id="quiz">
            <h1 class="text-8xl">Lorem ipsum dolor sit amet.</h1>
        </div>
    </div>

</x-lesson-layout>