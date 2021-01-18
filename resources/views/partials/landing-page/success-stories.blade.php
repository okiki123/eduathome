<section class="success-stories section bg-light">
    <div class="container section-contents mt-4">
        <div class="section-header">
            <h2 class="text-center">Success Stories</h2>
            <p class="text-center font-size-lg text-muted">
                What people have to say about us
            </p>
        </div>
        <div class="section-body">
            <ul class="row bxslider">
                @foreach($successStories as $story)
                    <li>
                        <blockquote class="blockquote text-center">
                            <p class="mb-0">
                                <span class='quote'>&#10078;</span>
                                {{ $story['message'] }}
                            </p>
                            <footer class="blockquote-footer mt-3">{{ $story['author'] }}</footer>
                        </blockquote>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
