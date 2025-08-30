                        {{-- Code sidebarMenu --}}
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @can('categories.view')
                            
                       <a class="nav-link" href="{{ route('dashboard.categories.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></div>
                            Categories
                        </a>
                        @endcan

                       <a class="nav-link" href="{{ route('dashboard.products.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-business-time"></i></div>
                            Products
                       </a>
                       <a class="nav-link" href="{{ route('dashboard.roles.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-paint-roller"></i></div>
                            Roles
                        </a>
                       
                        <nav class="" id="sidenavAccordionPages">
                                <a class="nav-link " href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </nav>
                                </div>
                            