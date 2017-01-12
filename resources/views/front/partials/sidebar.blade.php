<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="{{url('assets/images/picto.png')}}" alt="" /></a>
        <header>
            <h2>E-lycee :</h2>
            <p>Bienvenue sur le meilleur Lycée de l'ardèche !</p>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
        <h2>À lire aussi :</h2>
        <div class="mini-posts">
        @forelse($postsMostCommenteds as $postsMostCommented)
            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="/article/{{$postsMostCommented->id}}">{{$postsMostCommented->title}}</a></h3>
                    @if(!is_null($postsMostCommented->date))
                    <time class="published" datetime="{{$postsMostCommented->date}}">{{$postsMostCommented->date}}</time>
                        @else
                    <time class="published" datetime="{{$postsMostCommented->created_at->format('d/m/Y')}}">{{$postsMostCommented->created_at->format('d/m/Y')}}</time>
                    @endif
                    <a href="#" class="author"><img src="/assets/images/users/{{$post->user->url_thumbnail}}" alt="" /></a>
                </header>
                @if(!is_null($postsMostCommented->url_thumbnail))
                <a href="/article/{{$postsMostCommented->id}}" class="image"><img src="/assets/images/posts/{{$postsMostCommented->url_thumbnail}}" alt="" /></a>
                @endif
            </article>
            @empty
        @endforelse
        </div>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>Le Lycée</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="{{url('/mentions')}}" class="button">Learn More</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="{{url('/mentions')}}">Mentions Légales</a></li>
            <li><a href="{{url('/contact')}}">Contact</a></li>
        </ul>
        <p class="copyright">&copy; 2016 - E-lycee</p>
    </section>

</section>