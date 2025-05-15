<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('public/backend/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('dashboard')}}" >
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        {{-- <span class="badge bg-success rounded-pill float-end">4</span> --}}
                        <span> Dashboards </span>
                    </a>

                </li>

                <li class="menu-title mt-2">Apps</li>
                @if(Auth::user()->can('border.menu'))
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="fa fa-users"></i>
                        <span> Border Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.border_details')}}">Border List</a>
                            </li>
                            <li>
                                <a href="{{route('admin.border_details_create')}}">Add Border</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('rent.menu'))
                <li>
                    <a href="#sidebarRentCollect" data-bs-toggle="collapse">
                        <i class="fa fa-money-bill"></i>
                        <span> Border Rent Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRentCollect">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.border_rent')}}">Border Rent List</a>
                            </li>
                            <li>
                                <a href="{{route('admin.border_rent_create')}}">Add Border Rent</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('meal.menu'))
                <li>
                    <a href="#sidebarTotalMeal" data-bs-toggle="collapse">
                        <i class="fa fa-bowl-food"></i>
                        <span> Border Meal Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTotalMeal">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.total_meal')}}">Border Daily Meal List</a>
                            </li>
                            <li>
                                <a href="{{route('admin.total_meal_create')}}">Add Border Daily Meal</a>
                            </li>
                            <li>
                                <a href="{{route('admin.mealMonths')}}">Border Meal Month</a>
                            </li>
                            <li>
                                <a href="{{route('admin.meal_cost')}}">Border Meal Costs</a>
                            </li>
                            <li>
                                <a href="{{route('admin.meal_cost_create')}}">Add Meal Cost</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('bazar.menu'))
                <li>
                    <a href="#sidebarBazar" data-bs-toggle="collapse">
                        <i class="fa fa-leaf"></i>
                        <span> Bazar Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBazar">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.total_bazar')}}">Daily Bazar</a>
                            </li>
                            <li>
                                <a href="{{route('admin.total_bazar_create')}}">Add Daily Bazar</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('staff.menu'))
                <li>
                    <a href="#sidebarStaff" data-bs-toggle="collapse">
                        <i class="fa fa-user"></i>
                        <span> Staff Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarStaff">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.staff')}}">Staff List</a>
                            </li>
                            <li>
                                <a href="{{route('admin.staff_create')}}">Add Staff</a>
                            </li>
                            <li>
                                <a href="{{route('admin.staff_salary')}}">Staff Salary<Salary></Salary></a>
                            </li>
                            <li>
                                <a href="{{route('admin.staff_salary_create')}}">Add Staff Salary<Salary></Salary></a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

{{--                @if(Auth::user()->can('bill.menu'))--}}
{{--                <li>--}}
{{--                    <a href="#sidebarProductBuy" data-bs-toggle="collapse">--}}
{{--                        <i class="fa fa-cart-plus"></i>--}}
{{--                        <span> Extra Bill Manage </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="sidebarProductBuy">--}}
{{--                        <ul class="nav-second-level">--}}
{{--                            <li>--}}
{{--                                <a href="{{route('admin.product_buy')}}">Product Cost</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{route('admin.product_buy_create')}}">Add Product Cost</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                @endif--}}

                @if(Auth::user()->email == "admin@admin.com")
                <li>
                    <a href="#sidebarBill" data-bs-toggle="collapse">
                        <i class="fa fa-dollar-sign"></i>
                        <span> Own Bill Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBill">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.total_bill')}}">All Bills</a>
                            </li>
                            <li>
                                <a href="{{route('admin.total_bill_create')}}">Add Billing</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('problem.menu'))
                <li>
                    <a href="#sidebarDailyProblem" data-bs-toggle="collapse">
                        <i class="fa fa-info-circle"></i>
                        <span> Daily Problems </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDailyProblem">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.daily_problem')}}">Daily Problems</a>
                            </li>
                            <li>
                                <a href="{{route('admin.daily_problem_create')}}">Add Daily Problem</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('role.menu'))
                <li>
                    <a href="#sidebarRoles" data-bs-toggle="collapse">
                        <i class="fa fa-lock-open"></i>
                        <span> Roles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarRoles">
                        <ul class="nav-second-level">
{{--                            <li>--}}
{{--                                <a href="{{route('admin.permission')}}">Permission</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{route('admin.permission_create')}}">Add Permission</a>--}}
{{--                            </li>--}}
                            <li>
                                <a href="{{route('admin.role')}}">Role</a>
                            </li>
                            <li>
                                <a href="{{route('admin.role_create')}}">Add Role</a>
                            </li>
                            <li>
                                <a href="{{route('admin.role_permission')}}">Permission in Role</a>
                            </li>
                            <li>
                                <a href="{{route('admin.role_permission_create')}}">Add Permission in Role</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('user.menu'))
                <li>
                    <a href="#sidebarUser" data-bs-toggle="collapse">
                        <i class="fa fa-lock"></i>
                        <span> User List </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUser">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.user')}}">Users</a>
                            </li>
                            <li>
                                <a href="{{route('admin.user_create')}}">Add New User</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif


<!-- 
                <li data-bs-toggle='modal' data-bs-target='#softwareDeveloper'>
                    <a href="#"><i class="fa fa-code"></i> <span>For More</span> <span class="menu-arrow"></span></a>
                </li> -->

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>


<div class="modal fade" id="softwareDeveloper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Md. ASHIKUR RAHMAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('/backend/1671554859740.jpg')}}" style="height: 250px !important;" alt="">
                </div>
                <div class="mt-2">
                    <h3 class="text-center">Software Engineer</h3>
                    <p class="text-center"><a href="mailto:ashikurrahmanbpi72@gmail.com"><i class="fas fa-mail mr-2"></i><strong>ashikurrahmanbpi72@gmail.com</strong></a></p>
                    <p class="text-center"><i class="fas fa-phone-volume mr-2"></i><strong> 01792104772</strong></p>
                    <p class="text-center"><i class="fas fa-phone-volume mr-2"></i><strong> 01907371151</strong></p>
                    <p><a href="https://www.linkedin.com/in/iamashik194/"> <i class="fab fa-linkedin"> iamashik194</i> </a> || <a href="https://www.facebook.com/iamashik194"><i class="fab fa-facebook" > iamashik194</i></a> || <a href="https://www.instagram.com/iamashik194/"> <i class="fab fa-instagram"> iamashik194</i></a> ||  <a href="https://twitter.com/iamashik194"> <i class="fab fa-twitter"> iamashik194</i></a></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
