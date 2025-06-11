<section id="stats" class="stats section light-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-person color-blue flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahAnggota }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Anggota</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-people color-orange flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahKlub }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Klub</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-trophy color-green flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahAtlet }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Atlet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-award color-pink flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahJuri }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Juri</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
