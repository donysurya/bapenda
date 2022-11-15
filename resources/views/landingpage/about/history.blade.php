@extends('landingpage.main')

@section('title', 'Sejarah Bapenda | Pajak Online | Kabupaten Katingan - Kalimantan Tengah')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@push('headscript')
@endpush

@section('content')
    <div class="container-fluid mx-0 px-0">
        <div class="row gy-3 mt-3 px-3">

            @include('landingpage.about.menu', ['active' => 'history'])

            <div class="col-lg-12 p-4 pt-0">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-dark my-2">Sejarah Bapenda</h5>
                    </div>
                    <div class="card-body p-4 pb-0">
                        <h4 class="fw-bold text-uppercase text-center mb-3">Sejarah Bapenda kabupaten katingan provinsi kalimantan tengah</h4>
                        <hr class="bg-secondary">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-9 col-12 mb-3">
                                <img src="{{ asset('img/news/1.jpeg') }}" class="w-100" alt="...">
                            </div>
                            <div class="col-12">
                                <p style="text-align:justify;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Modi eligendi aspernatur maiores libero odio quasi quam officia laudantium corporis voluptas qui, voluptates quos hic autem quia quisquam architecto error sed ea incidunt dolorem fugiat, necessitatibus ab. Blanditiis magnam, vero fugit repellendus ipsa dolorem est. Earum corporis, iure possimus ratione adipisci at. Molestias voluptatem tempore animi beatae inventore quidem sunt nesciunt, autem, doloribus, quo eius hic itaque. Mollitia, magnam voluptatem excepturi deserunt id, impedit quaerat fugit, incidunt eveniet illo perspiciatis iusto quo recusandae. Voluptatum qui maiores suscipit ex fugit similique architecto nesciunt ab praesentium commodi eveniet, magni necessitatibus quod, consectetur harum, consequatur itaque saepe recusandae voluptates quasi natus? Natus quae ipsum deserunt aperiam accusantium dignissimos consequuntur facilis reprehenderit necessitatibus odio dolore dolorem quaerat saepe perferendis sapiente, consectetur fuga modi reiciendis eveniet vel distinctio. Tenetur dicta at sit? Sed error at culpa voluptates possimus tenetur, ullam quaerat voluptate natus blanditiis molestiae fugit vitae mollitia non nihil molestias quasi deserunt nobis ratione atque quam harum. Perspiciatis, modi distinctio corporis voluptatum in unde eveniet soluta quos cum quas, velit adipisci. Esse aspernatur iusto non at, cumque cum a nulla in repellendus sit tempore quis natus, unde neque, ipsum nemo ducimus temporibus repudiandae blanditiis aperiam possimus autem odio beatae. Aliquid, voluptatum animi laboriosam sunt quasi magni in vel deserunt reiciendis adipisci odio aspernatur quaerat libero nemo? Fugit ex, nulla ipsum, mollitia, cumque totam quaerat a corrupti recusandae tenetur veritatis temporibus quis. Fuga incidunt dolores minus amet laborum explicabo at tempora earum nostrum rem, perspiciatis dolore laboriosam fugiat? Sapiente animi delectus harum aut fugit earum, nemo consectetur eos assumenda rerum laudantium pariatur sit temporibus obcaecati quis, facilis facere, minima fugiat repellat. Odit veritatis eius sit praesentium tenetur rem blanditiis illum vero, voluptatem corrupti voluptate ratione laudantium amet repudiandae ducimus ad modi veniam quae eligendi provident. Excepturi culpa fugit voluptas pariatur? Laboriosam cumque in maiores laudantium commodi quas dolores cupiditate sequi aliquam, quisquam, quibusdam dolore labore! Repudiandae omnis soluta perferendis ipsum corporis alias magni impedit ex quas quidem. Debitis iusto ex error, corrupti provident vero nemo laborum distinctio consequatur nobis vitae enim temporibus voluptatum eius aliquid voluptate. Amet delectus architecto assumenda numquam quia. Sunt ipsam quisquam, possimus est repudiandae deserunt ea assumenda? Aspernatur minima aut odit repellendus consectetur tenetur. Quo molestias natus perspiciatis et asperiores delectus mollitia, temporibus ipsum vel enim itaque iusto autem, sed necessitatibus nulla culpa explicabo, architecto quod quia alias exercitationem dolorum! Aut, laboriosam illum aperiam similique eaque beatae hic omnis ea sunt blanditiis voluptatibus minus? Ea aspernatur, in placeat recusandae incidunt, laudantium laboriosam distinctio ratione quo natus rerum velit officiis temporibus quod, assumenda consectetur. Maxime inventore voluptatem velit tempore, magni ducimus, earum voluptate tempora pariatur obcaecati rerum recusandae, aspernatur quibusdam facilis ea vitae numquam laborum nulla. Quam labore fugiat vero a itaque. Nihil dolorem possimus tempore voluptatum, reiciendis praesentium nisi libero perferendis iure sed nulla suscipit rem, quisquam velit qui. Quas commodi quaerat eligendi dolorum quae natus corporis doloribus facilis quasi id ut, iste sunt beatae praesentium non saepe eos soluta alias. Maiores.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end p-4">
                        <img src="{{ asset('img/logo.png') }}" alt="" class="about_logo">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('bottomscript')
@endpush

