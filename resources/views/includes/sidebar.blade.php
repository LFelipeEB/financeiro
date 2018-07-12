<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><i class="fa fa-dollar-sign"></i> <span>G. Financeiro</span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bem-Vindo,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br />
        <span class="divider"></span>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3></h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="/">
                            <i class="fas fa-home"></i>
                            Pagina Inicial
                        </a>
                    </li>
                    <li><a><i class="fas fa-address-card" aria-hidden="true"></i> Dados Pessoais<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/user/{{auth()->id()}}">Meu Perfil</a></li>
                            <li><a href="/account/">Contas</a></li>
                            <li><a href="/creditcard/">Cartões de Credito</a></li>
                            <li><a href="/application">Aplicações</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fas fa-exchange-alt"></i> Movimentações<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/profit">Receitas</a></li>
                            <li><a href="/expense/">Despesas</a></li>
                            <li><a href="/invocecreditcard/">Faturas de Cartao de Credito</a></li>
                            <li><a href="/account/transfer">Transferir Valores entre Contas</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/category">
                            <i class="fas fa-list-ul"></i>
                            Categorias Disponiveis
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>