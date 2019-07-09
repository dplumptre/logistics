





 


<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="{{ route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>


                            <li>
                            <a href="{{ route('home.view.equipment')}}""><i class="fa fa-wrench fa-fw"></i> Equipment</a> 
                            </li>

                            <li>
                            <a href="{{ route('home.view.location')}}""><i class="fa fa-location-arrow fa-fw"></i> Locations</a> 
                            </li>
                            @if( auth()->user()->hasRole('admin')   || auth()->user()->hasRole('super-admin')   )

                            <li>
                            <a href="{{ route('admin.all.users')}}""><i class="fa fa-users fa-fw"></i> Users</a>
                            </li>   

                            <li>
                            <a href="{{ route('admin.view.role')}}""><i class="fa fa-user fa-fw"></i> Roles</a> 
                            </li>
                            @endif
                           
                       
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->