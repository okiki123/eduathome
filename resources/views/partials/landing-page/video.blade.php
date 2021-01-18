<section class="video-section bg-light section d-flex align-items-center">
    <div class="container section-contents mt-4 w-100">
        <div class="section-header">
            <h2 class="text-center">Work from Home?</h2>
        </div>
        <div class="section-body">
            <div class="mxw-1200 mx-auto">
                <video class="video video-js vjs-theme-forest" id="my-video" controls
                       preload="auto"
                       poster="{{ asset('images/video_image.jpg') }}"
                       data-setup="{}">
                    <source src={{ asset('videos/video.mp4') }} type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</section>
