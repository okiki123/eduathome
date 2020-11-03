<section class="success-stories section">
    <div class="container section-contents mt-4">
        <div class="section-header">
            <h2 class="text-center">Success Stories</h2>
            <p class="text-center font-size-md text-muted">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
        <div class="section-body">
            <div class="row">
                @foreach($customers as $customerImg)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header" style="background-image: url({{ $customerImg }})"></div>
                            <div class="card-body">
                                <em class="card-text text-muted">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu sapien
                                    eros. Nulla mollis ligula a metus ornare porttitor. Ut lacus magna, sodales
                                    non mattis a, efficitur quis lorem. Suspendisse potenti. Aenean ac cursus
                                    metus. Ut et eros ut turpis imperdiet bibendum ut sed diam"
                                </em>
                                <p class="mt-3">
                                    <strong>
                                        John Paul
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
