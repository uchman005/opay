<!-- Breadcrumbs -->
<section class="position-relative top-banner bg-gray">
    <div class="bg-fixed" style="background-image: url('assets/images/mazaa-pattern.png');"></div>
    <div class="top-banner-content text-center">
        <div class="baner-name">
            <h2 class="fs-50 text-uppercase">contact us</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center p-0 mb-0">
                    <li class="breadcrumb-item text-gray fs-18"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active text-theme fs-18"><a href="javascript:void(0)">Contact Us</a></li>
                </ol>
            </nav>
        </div>
    </div>
</section>


<main>
    <section class="pt-110 pb-70">
        <div class="container">
            <p><?= $Self->Toast() ?></p>
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <h3 class="contact-icon-title">Don't Be a By-Stander Just Say Hello.</h3>
                    <p class="fs-18">
                        Starting your POS Business might be as easy as just saying Hi to the right channel, we will be glad to have you.
                    </p>
                    <div class="contact-icon-box d-flex align-items-center">
                        <a href="tel:+2348181708716">
                            <i class="flaticon-phone"></i>
                            <strong class="text-gray fs-18">Phone: </strong>
                            <span class="text-gray fs-18">+2348181708716</span>
                        </a>
                    </div>

                    <!-- https://wa.me/<number> -->
                    <div class="contact-icon-box d-flex align-items-center">
                        <a href="https://wa.me/+2348181708716">
                            <i class="fab fa-whatsapp"></i>
                            <strong class="text-gray fs-18">Whatsapp: </strong>
                            <span class="text-gray fs-18">+2348181708716</span>
                        </a>
                    </div>

                    <div class="contact-icon-box d-flex align-items-center">
                        <i class="flaticon-mail"></i>
                        <strong class="text-gray fs-18">Email: </strong>
                        <span class="text-gray fs-18"><a href="mailto:diamondconceptpaygam@gmail.com">diamondconceptpaygam@gmail.com</a></span>
                    </div>
                    <ul class="contact-social list-unstyled d-flex mt-30 mb-0">
                        <li><a href="javascript:void(0)" class="text-white d-inline-block text-center" style="background-color: #365dce;"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:void(0)" class="text-white d-inline-block text-center" style="background-color: #36c9e4;"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-12">
                    <form action="./contact" method="post" class="contact-form">
                        <input class="w-100" name="name" type="text" placeholder="Complete Name">
                        <input class="w-100" name="email" type="email" placeholder="Email Address">
                        <input class="w-100" name="phone" type="text" placeholder="Phone No">
                        <textarea class="w-100" name="message" placeholder="We reply in less than 48 hours"></textarea>
                        <button type="submit" class="theme-btn-secondary mt-20">Send Messages <span></span></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>