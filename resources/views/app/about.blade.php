@extends('layouts.app')

@section('content')
    <div class="about-us">
        <!-- banner and navbar -->
        <section class="banner-section d-flex flex-column">
            @include('partials.shared.navbar')

            <div class="banner flex-grow-1 d-flex justify-content-center align-items-center">
                <div class="text-white search-area">
                    <div class="text text-center">
                        <h2 class="mb-3">About us</h2>
                        <p class="mx-auto search-text">
                            Edu@Home is an online marketplace that caters to parents needing a specialized tutor that
                            will assist their children during school hours in their home.
                        </p>
                    </div>
                </div>
            </div>

        </section>

        <!-- Mission -->
        <div class="aim">
            <div class="mxw-1200">
                <div class="d-lg-flex">
                    <div class="col-lg-6 d-lg-flex justify-content-lg-start mt-4 mt-lg-0 px-0 px-md-2">
                        <div class="text-center mb-3">
                            <img class="aim__image mb-4" alt="describing aim" src={{asset('images/mission.jpg')}} />
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="aim__texts text-center text-lg-left pl-lg-4">
                            <div class="aim__big-text mb-3">
                                Our Mission
                            </div>
                            <div class="aim__small-text font-size-lg">
                                Edu@Home is a customer centered company. At Edu@Home our mission is to help overwhelmed
                                parents by assisting them with daily help to ensure that their child’s learning does
                                not stop because they are not in a school building. Our main focus is on making the
                                tutor hiring process seamless and transparent. Through our proprietary technology we
                                help parents by providing them with expert tutors, those that will help and support
                                their children while learning online.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Good hands -->
        <section class="good-hands">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-6 text d-flex flex-column justify-content-center">
                        <h2 class="border-main-bottom pb-3 mb-3">You are in good hands</h2>

                        <div class="mb-3">
                            <p class="font-w600 mb-0 font-size-lg">We Provide Efficiency</p>
                            <p>
                                Our website is designed to give our customers the full authenticity and to identify
                                teachers for all different learning levels with different expertise starting from high
                                school Seniors, College students as well as Certified teachers.
                            </p>
                        </div>

                        <div class="mb-3">
                            <p class="font-w600 mb-0 font-size-lg">How it is done?</p>
                            <p>
                                We provide a medium where our clients can select according to their requirements,
                                purpose, budget and provide customized services.
                            </p>
                        </div>

                        <div class="mb-3">
                            <p class="font-w600 mb-0 font-size-lg">You are not alone</p>
                            <p>
                                We offer consultation to advise our clients with hiring subject specific teachers from
                                all different expertise making sure our customers receive authentication while we do
                                the due diligence before finalizing a tutor for our clients and students.
                            </p>
                        </div>

                        <div class="button mt-3">
                            <a class="btn btn-block btn-secondary" href="{{ route('register') }}">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6 picture d-none d-md-block">
                    </div>

                </div>
            </div>
        </section>

        <!-- Strategy -->
        <section class="strategy bg-light">
            <div class="container d-flex flex-column align-items-center">
                <h2 class="font-w600 mb-4">Our Strategies for your success</h2>
                <div class="font-size-lg texts">
                    <p>
                        <i class="fas fa-minus-circle text-primary mr-3"></i>
                        Enhancing the tutor hiring process by utilization of the most current technology and making it
                        transparent and seamless.
                    </p>
                    <p>
                        <i class="fas fa-minus-circle text-primary mr-3"></i>
                        Offer specialized and professional services to every customer with satisfactory results
                        promoting our company's goodwill.
                    </p>
                    <p>
                        <i class="fas fa-minus-circle text-primary mr-3"></i>
                        Maintain maximum customers satisfaction and building long term relationship with customers as we
                        build a  strong network.
                    </p>
                    <p>
                        <i class="fas fa-minus-circle text-primary mr-3"></i>
                        Assist parents by supporting and helping their students while learning.
                    </p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        @include('partials.shared.footer')
    </div>

@endsection
