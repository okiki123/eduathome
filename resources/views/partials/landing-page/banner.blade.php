<section class="banner-section d-flex flex-column">
    <nav class="navbar navbar-expand-lg fixed-top bg-white navbar-light main-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.jpg') }}" width="40" height="40" class="d-inline-block align-top" alt="">
                <span class="font-size-xl font-w600">Edu@Home</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Find Caregiver</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
                <div>
                    <a class="btn btn-light btn-standard font-w600">Login</a>
                    <a class="btn btn-primary btn-standard font-w600">Join</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="banner flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="text-white search-area">
            <div class="text text-center">
                <h2>Welcome to Edu@Home</h2>
                <p class="search-text">Search and find Caregivers near you</p>
            </div>
            <div class="form-search text-center d-flex justify-content-center">
                <form class="form d-md-flex">
                    <div class="form-group mb-2 mb-md-0 mx-2">
                        <select class="form-control font-size-lg" id="selcategory">
                            <option value="">select category</option>
                        </select>
                    </div>
                    <div class="form-group mb-2 mb-md-0 mx-2 font-size-lg">
                        <input type="text" placeholder="location"  class="form-control font-size-lg" autocomplete="off">
                    </div>
                    <div class="mx-2">
                        <button type="button" class="btn btn-primary btn-standard btn-block h-100 font-size-lg font-w600">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
