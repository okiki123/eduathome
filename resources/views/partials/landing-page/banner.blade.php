<section class="banner-section d-flex flex-column">
    @include('partials.shared.navbar')

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
