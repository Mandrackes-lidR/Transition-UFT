@extends('layout')

@section('title'){{ __('index.page_title', ['app_name' => env('APP_NAME')]) }}@endsection

@section('scripts')
    <script src="{{ mix('js/index.js') }}"></script>
@endsection

@section('content')
    @if ($errors->any())
        <div
            class="w-full flex justify-between items-center space-x-2 fixed top-[56px] bg-red-200 text-red-500 z-10 p-4 md:top-[64px] md:px-4 lg:top-[72px]"
            id="error-alert"
        >
            <div>
                <p>{{ __('form.failure') }}</p>
            </div>
            <button
                class="btn bg-red-500 text-sm text-white min-w-max hover:bg-transparent hover:border-red-500 hover:text-red-500 focus:ring-red-500 md:text-base"
                onclick="scrollToForm()"
            >{{ __('form.fix') }}</button>
        </div>
    @endif

    <main role="main">
        <!-- Title -->
        <x-page-title>
            <x-slot name="title">{!! __('index.title') !!}</x-slot>

            <x-slot name="subtitle">{!! __('index.subtitle.already') !!} <span
                    class="bg-theme text-white p-1"
                >{!! __('index.subtitle.sign_count', ['count' => $count]) !!}</span>
            </x-slot>

            <x-slot name="scrollButtonText">{{ __('index.start_reading') }}</x-slot>
            <x-slot name="scrollButtonAction">scrollToForm()</x-slot>
        </x-page-title>

        <section class="w-full mb-12 md:text-lg" id="manifesto">
            <!-- Headline -->
            <header class="bg-theme text-white text-justify py-10 px-4 md:px-20 lg:px-0">
                <p class="mx-auto max-w-4xl">
                    Nous sommes un groupe d’étudiant.e.s présent.e.s dans les différentes écoles de l’université
                    fédérale. Nous venons d’universités, d’écoles d’ingénieurs, de commerce, de SciencesPo... <u>Nous
                        représentons la diversité des établissements de l’Université Fédérale de Toulouse</u>.
                </p>
            </header>
            <!-- Socials -->
            <aside
                class="text-theme dark:text-theme-light flex-col sticky top-40 ml-4 mt-4 p-0 text-center hidden md:inline-flex"
            >
                <div class="opacity-30 px-2.5 my-3 mx-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"
                        />
                    </svg>
                </div>
                <hr class="border-theme-light opacity-30 w-full my-4"/>
                <div class="flex flex-col space-y-6 px-2.5 mx-0">
                    <a class="transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                       href="{{ env('LINK_POST_FB') }}" target="_blank" title="{{ __('socials.facebook') }}"
                    >
                        <x-icons.facebook class="h-5 w-5"></x-icons.facebook>
                    </a> <a
                        class="transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ env('LINK_POST_TW') }}" target="_blank" title="{{ __('socials.twitter') }}"
                    >
                        <x-icons.twitter class="h-5 w-5"></x-icons.twitter>
                    </a> <a
                        class="transition transform motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ env('LINK_POST_INSTA') }}" target="_blank" title="{{ __('socials.instagram') }}"
                    >
                        <x-icons.instagram class="h-5 w-5"></x-icons.instagram>
                    </a>
                </div>
            </aside>
            <!-- Manifesto -->
            <article class="text-justify px-4 mt-12 md:-mt-44 md:pr-8 md:pl-20 lg:px-0">
                <div class="mx-auto max-w-4xl">
                    <p class="mt-5">
                        En tant qu’étudiantes et étudiants, nous nous sentons particulièrement concerné.e.s par les
                        questions liées aux enjeux socio-écologiques et nous considérons qu’elles ne sont pas prises en
                        compte de façon sérieuse au sein de l’enseignement supérieur et notamment de&nbsp;:
                    </p>
                    <ul class="list-disc marker:text-theme dark:marker:text-theme-light pl-4 space-y-2 mt-5 md:pl-6 lg:pl-7">
                        <li>
                            <strong class="text-theme dark:text-theme-light">nos cursus étudiants</strong>&nbsp;:
                            sommes-nous formé.e.s de façon cohérente face à ces enjeux&nbsp;? Les différentes entités1
                            qui se sont penchées dessus penchent plutôt pour le non (encore tout récemment <a
                                class="underline text-theme dark:text-theme-light transition hover:text-theme-dark dark:hover:text-theme"
                                href="https://start.lesechos.fr/apprendre/universites-ecoles/exclusivite-classement-2021-des-ecoles-et-universites-pour-changer-le-monde-quels-sont-les-30-etablissements-les-mieux-classes-1357899"
                                target="_blank"
                            >le classement des Echos Start</a> nous confirme cette tendance). Aurons-nous les
                            compétences pour répondre à ces mêmes problématiques&nbsp;? Encore une fois, la réponse est
                            loin d’être évidente
                        </li>
                        <li>
                            <strong class="text-theme dark:text-theme-light">nos débouchés professionnels</strong>&nbsp;:
                            trouverons-nous un métier qui soit en phase avec nos convictions&nbsp;? Aura-t-il du sens&nbsp;?
                            Pour quelle utilité sociétale&nbsp;?
                        </li>
                        <li>
                            <strong class="text-theme dark:text-theme-light">notre citoyenneté</strong>&nbsp;: face au
                            lot de catastrophes qui nous est promis, nous ne pouvons rester inactif.ve.s. Il est crucial
                            que nous agissions pour une transformation de la société. Il est temps maintenant d’aider
                            collectivement à la transition de nos établissements !
                        </li>
                        <li>
                            <strong class="text-theme dark:text-theme-light">son exemplarité</strong>&nbsp;: que penser
                            d’établissements qui ne prennent même pas la peine de respecter le peu de réglementations
                            environnementales en vigueur (ex&nbsp;: publier son bilan d’émission de gaz à effet de serre
                            - BEGES - tous les 3 ans) alors qu’il faudrait non pas mesurer mais réduire (de 5% par an)
                            ces émissions&nbsp;?
                        </li>
                    </ul>
                    <p class="mt-5">
                        Face à ce constat, nous avons souhaité faire <strong>13 propositions pour accélérer la
                            transition de l’ensemble de l’UFT</strong>. Nous sommes conscient.e.s de la complexité de
                        cette tâche au vu de la diversité des établissements (que ce soit en taille, thématique,
                        gouvernance). Toutefois, la <strong>complexité ne doit pas être une excuse à notre
                            inaction</strong>.
                    </p>
                    <h2 class="section-title mt-8">Les 5 actions fondamentales pour créer une dynamique de transition
                        globale</h2>
                    <p class="mt-5">
                        La transition ne se fera que si les directions sont convaincues de la nécessité d’impulser un
                        changement face aux enjeux, que le personnel adhère à ce projet de transformation et que des
                        moyens financiers et humains à la hauteur y soient dédiés. Nous avons déjà porté ces
                        propositions auprès de l’Université fédérale de Toulouse (instance administrative regroupant les
                        universités toulousaines) qui, malgré sa volonté de collaborer à ce sujet, n’a souhaité retenir
                        que moins de la moitié de ces propositions. Or, pour être à la hauteur des enjeux, nous pensons
                        que cela ne suffit pas. L’enjeu est à présent de créer un rapport de force à l’intérieur de nos
                        établissements en étant le plus nombreux.ses à signer ce document pour avoir du poids et
                        permettre ensuite de porter ces propositions au sein des instances décisionnelles de nos
                        administrations. Lesdites propositions sont :
                    </p>
                    <ol class="measure-list mt-5">
                        <li>
                            Former les directions de l’ensemble des établissements aux enjeux socio-écologiques en leur
                            proposant une formation de 10h avant fin 2022.
                        </li>
                        <li>
                            Former l’ensemble du personnel volontaire aux enjeux socio-écologiques.
                        </li>
                        <li>
                            Publier une feuille de route par établissement avant fin 2022 présentant les actions qui
                            seront mises en place pour mener sa transition écologique.
                        </li>
                        <li>
                            Soutenir ces transformations en y allouant des moyens humains et financiers permettant de
                            les structurer, de les suivre et finalement de les réaliser.
                        </li>
                        <li>
                            Créer un comité écologique dans chaque établissement associant direction, corps professoral,
                            personnel administratif et technique et étudiants.
                        </li>
                    </ol>
                    <h2 class="section-title mt-8">Transformer la formation</h2>
                    <p class="mt-5">
                        Pour faire la transition, il nous faudra comprendre le constat planétaire, les conséquences que
                        cela aura sur notre société, sur nous et identifier les causes (politiques, économiques,
                        historiques) pour tenter d’y apporter une réponse. Une fois ce constat compris, il est
                        indispensable d’adapter l’ensemble des filières à celui-ci.
                    </p>
                    <ol class="measure-list mt-5" start="6">
                        <li>
                            Sensibiliser aux enjeux de la transition socio-écologique 100% des personnes inscrites dans
                            l’établissement lors de leur première année d’étude à l’aide d’approches pédagogiques
                            dédiées.
                        </li>
                        <li>
                            Inclure dans l’intégralité des formations des établissements un tronc commun
                            interdisciplinaire obligatoire de 30h sur les enjeux socio-écologiques valorisé par des
                            crédits ECTS.
                        </li>
                        <li>
                            Adapter les enseignements de chaque filière au regard des enjeux sociaux et
                            environnementaux.
                        </li>
                    </ol>
                    <h2 class="section-title mt-8">Valoriser la vie étudiante</h2>
                    <p class="mt-5">
                        Donner la possibilité à tous de s’émanciper, se questionner en dehors de son cursus pour relier
                        études du supérieur et citoyenneté.
                    </p>
                    <ol class="measure-list mt-5" start="9">
                        <li>
                            Permettre à chaque étudiant.e de s'engager dans des activités à vocation socio-écologique et
                            de participer à la construction du monde durable de demain.
                        </li>
                        <li>
                            Faciliter et valoriser les césures axées sur la transition écologique et sociale notamment à
                            travers des retours d’expériences.
                        </li>
                    </ol>
                    <h2 class="section-title mt-8">Être exemplaire</h2>
                    <p class="mt-5">
                        La transition écologique ne peut être une action marginale ou silotée, elle nécessite de
                        transformer nos institutions. C’est dans ce cadre que nous souhaitons que nos universités soient
                        exemplaires en réduisant leurs impacts environnementaux et plus largement en adaptant l’ensemble
                        de son activité.
                    </p>
                    <ol class="measure-list mt-5" start="11">
                        <li>
                            Réduire la quantité de déchets à la source (papiers, gobelets, canettes) et rendre
                            obligatoire le tri sélectif sur l’ensemble des campus de l’UFT.
                        </li>
                        <li>
                            Élaborer et suivre des stratégies bas carbone sur l’ensemble des campus suivant la
                            méthodologie proposée par l’Accord de Grenoble.
                        </li>
                        <li>
                            Avoir une communication honnête et transparente sur l'état de la transition et les actions
                            entreprises.
                        </li>
                    </ol>
                </div>
            </article>
        </section>

        <x-motivation></x-motivation>

        <!-- Form -->
        <section
            class="w-full flex items-center min-h-[calc(100vh-56px)] py-8 px-4 md:min-h-[calc(100vh-64px)] md:px-20 lg:min-h-[calc(100vh-72px)] lg:px-0"
            id="form"
        >
            <div class="mx-auto max-w-4xl">
                <div class="flex flex-col items-center space-y-4 md:flex-row md:justify-between md:items-baseline">
                    <h2 class="section-title">{{ __('index.form_title') }}</h2>
                    <p class="text-xl">
                        {{ __('index.subtitle.already') }}
                        <span class="bg-theme text-white p-1"
                        >{!! __('index.subtitle.sign_count', ['count' => $count]) !!}</span>
                    </p>
                </div>
                <x-form :institutions="$institutions" :categories="$categories"></x-form>
            </div>
        </section>
    </main>
@endsection
