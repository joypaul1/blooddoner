<section class="donor-container">
    <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <h2 class="search-header">{{ isset($pageName)?$pageName:'-' }}</h2>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="breadcrumb-container">
                <ol>
                    <li><a href=""><i class="fas fa-home" aria-hidden="true"></i></a></li>
                    <li><span>&gt;</span></li>
                    <li><a href="{{ isset($pageLink) ?$pageLink :'-' }}">{{ isset($pageName)?$pageName:'-' }}</a></li>
                </ol>
            </div>
        </div>
    </div>
    </div>
</section>
