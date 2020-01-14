@extends(!Auth::guest() ? \Illuminate\Support\Facades\Auth::user()->admin? 'admin.main' : 'main_layout' : 'main_layout');@section('title')
@section('title')
    Aide
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Cette page est dédié aux différentes questions que vous pourriez avoir...</h3>
            <div>
                <ol>
                    <li><a href="#compte">Comment créer un compte?</a></li>
                    <li><a href="#course">Comment créer une course?</a></li>
                    <li><a href="#produits">Où trouvez les produits?</a></li>
                    <li><a>J'ai oublié mon mot de passe</a></li>
                    <li><a href="http://www.topito.com/top-meilleurs-supermarches-ligne-cybermarches" target="_blank">D'autres
                            sites pour effectuer vos courses</a></li>
                </ol>
            </div>
        </div>
        <div class="card-body">
            <div>
                <h2 id="compte">Comment créer un compte?</h2>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit, purus in eleifend
                tempor,
                risus
                lacus porttitor felis, ut dignissim nisl dui eu tellus. Pellentesque consequat ligula elit, ac faucibus
                velit
                volutpat eget. Phasellus lacinia pellentesque nibh, at placerat tortor euismod at. Maecenas pulvinar
                turpis
                nunc. Pellentesque egestas nulla nec nulla tincidunt, id tincidunt lectus fringilla. Vestibulum mollis
                dictum
                lectus, at viverra lorem volutpat ut. Proin ut risus vitae felis faucibus vehicula. Suspendisse aliquam
                purus
                eget condimentum semper. Aenean tincidunt congue neque sit amet imperdiet. Proin a nisl risus. Quisque
                tortor
                velit, vestibulum nec aliquet sit amet, condimentum in nibh. In hac habitasse platea dictumst. Nam in
                lectus
                eget est convallis interdum. Maecenas at orci nisi. Fusce eu sem sit amet nunc malesuada dictum. Vivamus
                dapibus, tellus quis dapibus rhoncus, augue sapien laoreet ante, vel tristique dui magna sed ante.

                Vestibulum semper blandit elementum. Nullam ultrices nunc in erat lacinia cursus. Vivamus ipsum augue,
                rutrum
                vitae turpis eu, convallis varius sapien. Sed mattis quis sem eget scelerisque. Suspendisse finibus
                tortor
                in
                nulla accumsan, sed blandit magna finibus. Sed aliquet congue bibendum. Morbi eget ornare risus, eget
                cursus
                libero. Donec suscipit mauris sed scelerisque interdum. Nullam vel purus laoreet, venenatis quam at,
                imperdiet
                est. Duis malesuada mollis turpis. Curabitur vestibulum velit ac est malesuada, sed rhoncus lorem
                maximus.

                Aenean semper, mi ultricies mattis eleifend, nibh sapien blandit justo, vel placerat risus enim laoreet
                elit.
                Praesent at risus neque. In at justo at ipsum feugiat sodales quis vel nisl. Vestibulum consectetur
                placerat
                nunc, id egestas augue commodo in. Curabitur nec libero eget arcu scelerisque auctor. Nulla eu elit
                sollicitudin, tristique mauris a, dapibus velit. Integer aliquam felis sagittis vulputate efficitur.
                Orci
                varius
                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam fermentum scelerisque
                nunc,
                ac vestibulum nisl auctor in. Donec sed augue neque.

            </div>
            <div>
                <h2 id="course">Comment créer une course?</h2>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit, purus in eleifend
                tempor,
                risus
                lacus porttitor felis, ut dignissim nisl dui eu tellus. Pellentesque consequat ligula elit, ac faucibus
                velit
                volutpat eget. Phasellus lacinia pellentesque nibh, at placerat tortor euismod at. Maecenas pulvinar
                turpis
                nunc. Pellentesque egestas nulla nec nulla tincidunt, id tincidunt lectus fringilla. Vestibulum mollis
                dictum
                lectus, at viverra lorem volutpat ut. Proin ut risus vitae felis faucibus vehicula. Suspendisse aliquam
                purus
                eget condimentum semper. Aenean tincidunt congue neque sit amet imperdiet. Proin a nisl risus. Quisque
                tortor
                velit, vestibulum nec aliquet sit amet, condimentum in nibh. In hac habitasse platea dictumst. Nam in
                lectus
                eget est convallis interdum. Maecenas at orci nisi. Fusce eu sem sit amet nunc malesuada dictum. Vivamus
                dapibus, tellus quis dapibus rhoncus, augue sapien laoreet ante, vel tristique dui magna sed ante.

                Vestibulum semper blandit elementum. Nullam ultrices nunc in erat lacinia cursus. Vivamus ipsum augue,
                rutrum
                vitae turpis eu, convallis varius sapien. Sed mattis quis sem eget scelerisque. Suspendisse finibus
                tortor
                in
                nulla accumsan, sed blandit magna finibus. Sed aliquet congue bibendum. Morbi eget ornare risus, eget
                cursus
                libero. Donec suscipit mauris sed scelerisque interdum. Nullam vel purus laoreet, venenatis quam at,
                imperdiet
                est. Duis malesuada mollis turpis. Curabitur vestibulum velit ac est malesuada, sed rhoncus lorem
                maximus.

                Aenean semper, mi ultricies mattis eleifend, nibh sapien blandit justo, vel placerat risus enim laoreet
                elit.
                Praesent at risus neque. In at justo at ipsum feugiat sodales quis vel nisl. Vestibulum consectetur
                placerat
                nunc, id egestas augue commodo in. Curabitur nec libero eget arcu scelerisque auctor. Nulla eu elit
                sollicitudin, tristique mauris a, dapibus velit. Integer aliquam felis sagittis vulputate efficitur.
                Orci
                varius
                natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam fermentum scelerisque
                nunc,
                ac vestibulum nisl auctor in. Donec sed augue neque.

                Maecenas ac lectus vitae arcu ullamcorper rutrum in sit amet massa. Donec ut laoreet dolor, eget
                sollicitudin
                enim. Cras aliquam est leo, sed molestie arcu pretium id. Etiam sit amet massa eu nunc elementum
                porttitor.
                Integer dignissim nisi nec felis sollicitudin, eget tincidunt odio consectetur. Suspendisse potenti.
                Etiam
                dictum, urna ac venenatis ornare, mi libero ornare mauris, vitae consectetur orci dolor eu enim.
                Curabitur
                ut
                elementum mauris. Phasellus eget quam et nulla lacinia mattis id sollicitudin lorem. Mauris tincidunt
                porta
                justo, vel tincidunt ligula porttitor iaculis. Donec lacinia ac eros placerat luctus. Ut tempor auctor
                lectus ac
                porttitor. Integer quis neque vel velit blandit semper. Etiam sed tincidunt elit, eget vulputate ante.
                Nullam
                dignissim luctus ligula, nec pellentesque diam tempor quis. In cursus mi sed facilisis placerat.

            </div>
            <div>
                <h2 id="produits">Comment créer un compte?</h2>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit, purus in eleifend
                tempor,
                risus
                lacus porttitor felis, ut dignissim nisl dui eu tellus. Pellentesque consequat ligula elit, ac faucibus
                velit
                volutpat eget. Phasellus lacinia pellentesque nibh, at placerat tortor euismod at. Maecenas pulvinar
                turpis
                nunc. Pellentesque egestas nulla nec nulla tincidunt, id tincidunt lectus fringilla. Vestibulum mollis
                dictum
                lectus, at viverra lorem volutpat ut. Proin ut risus vitae felis faucibus vehicula. Suspendisse aliquam
                purus
                eget condimentum semper. Aenean tincidunt congue neque sit amet imperdiet. Proin a nisl risus. Quisque
                tortor
                velit, vestibulum nec aliquet sit amet, condimentum in nibh. In hac habitasse platea dictumst. Nam in
                lectus
                eget est convallis interdum. Maecenas at orci nisi. Fusce eu sem sit amet nunc malesuada dictum. Vivamus
                dapibus, tellus quis dapibus rhoncus, augue sapien laoreet ante, vel tristique dui magna sed ante.

                Vestibulum semper blandit elementum. Nullam ultrices nunc in erat lacinia cursus. Vivamus ipsum augue,
                rutrum
                vitae turpis eu, convallis varius sapien. Sed mattis quis sem eget scelerisque. Suspendisse finibus
                tortor
                in
                nulla accumsan, sed blandit magna finibus. Sed aliquet congue bibendum. Morbi eget ornare risus, eget
                cursus
                libero. Donec suscipit mauris sed scelerisque interdum. Nullam vel purus laoreet, venenatis quam at,
                imperdiet
                est. Duis malesuada mollis turpis. Curabitur vestibulum velit ac est malesuada, sed rhoncus lorem
                maximus.

            </div>
        </div>
    </div>
@endsection