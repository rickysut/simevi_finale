<!-- BEGIN Left Aside -->
<aside class="page-sidebar">
	<div class="page-logo">
		<a href="/" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
			<img src="{{ asset('img/logo-icon.png') }}" alt="SiMEvI WebApp" aria-roledescription="logo">
			<span class="page-logo-text mr-1">SiMEvI WebApp</span>
			<!--span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i--->
		</a>
	</div>
	<!-- BEGIN PRIMARY NAVIGATION -->
	<nav id="js-primary-nav" class="primary-nav" role="navigation">
		
		<div class="nav-filter">
			<div class="position-relative">
				<input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
				<a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
					<i class="fal fa-chevron-up"></i>
				</a>
			</div>
		</div>
		<div class="info-card">
			<!--img src="{{ asset('img/favicon.png') }}" class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
			<div class="info-card-text">	
				<a href="#" class="d-flex align-items-center text-white">
					<span class="text-truncate text-truncate-sm d-inline-block">
						{{ Auth::user()->username }}
					</span>
				</a>
				<span class="d-inline-block text-truncate text-truncate-sm">{{ Auth::user()->name }}</span>
			</div-->
			<img src="{{ asset('img/cover-8-lg.png') }}" class="cover" alt="cover" style="max-width: 100%;" >
			<a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input" >
				<i class="fal fa-angle-down"></i>
			</a>
		</div>
		<ul id="js-nav-menu" class="nav-menu">
			<!-- menu dashboard -->
			<li class="nav-title" data-i18n="nav.monitoring_analysis">{{ trans('simevi.sidemenu_parent1') }}</li>
			<li class="{{ request()->is("admin") || request()->is("admin/vip*") ? "active open" : "" }} ">
				<a href="#" data-filter-tags="{{ strtolower(trans('global.dashboard')) }}">
					<i class="fal fa-chart-bar"></i>
					<span class="nav-link-text" data-i18n="nav.monitoring_analysis_sub1">{{ trans('simevi.sidemenu_parent11') }}</span>
				</a>
				<ul>
					@can('dashboard_access')
					<li class="{{ request()->is("admin") ? "active" : "" }}">
						<a href="{{ route("admin.home") }}" title="Dashboard" data-filter-tags="{{ strtolower(trans('global.dashboard')) }}" class="waves-effect waves-themed">
							<span class="nav-link-text" data-i18n="nav.monitoring_analysis_sub1_menu1">{{ trans('global.dashboard') }}</span>
						</a>
					</li>
					@endcan
					@can('dashboardvip_access')
					<li class="{{ request()->is("admin/vip*") ? "active" : "" }} ">
						<a href="{{ route("admin.dashboardvip") }}" title="Ringkasan Eksekutif" data-filter-tags="{{ strtolower(trans('cruds.dashboardvip.title')) }}" class="waves-effect waves-themed">
							<span class="nav-link-text" data-i18n="nav.monitoring_analysis_sub1_menu2">{{ trans('cruds.dashboardvip.title') }}</span>
						</a>
					</li>
					@endcan
				</ul>
			</li>
			<li class=" {{ request()->is("admin/detailserapan") || request()->is("admin/detailserapan/*") ? "active open" : "" }}">
				<a href="#" title="Dashboard Analisa" data-filter-tags="{{ strtolower(trans('simevi.sidemenu_parent12')) }}">
					<i class="fal fa-chart-line"></i>
					<span class="nav-link-text" data-i18n="nav.monitoring_analysis_sub2">{{ trans('simevi.sidemenu_parent12') }}</span>
				</a>
				<ul>
					@can('kinerja_serapan_access')
					<li class=" {{ request()->is("admin/detailserapan") || request()->is("admin/detailserapan/*") ? "active" : "" }}">
						<a href="{{ route("admin.detailserapan") }}" title="kinerja serapan" data-filter-tags="{{ strtolower(trans('cruds.kinerjaSerapan.title')) }}" class="waves-effect waves-themed" >
							<span class="nav-link-text" data-i18n="nav.monitoring_analysis_sub2_menu1">
								{{ trans('cruds.kinerjaSerapan.title') }}
							</span>
						</a>
					</li>
					@endcan
				</ul>
			</li>
			<!-- end menu dashboard -->
			
			<!-- menu sub aplikasi -->
			@can('app_connection_access')
			<li class="nav-title" data-i18n="nav.sub_application">{{ trans('cruds.appConnection.title') }}</li>
			
			<!-- sub menu app anggaran -->
				<li class="{{ request()->is("admin/data-renjas*") || request()->is("admin/data-pagus*") || request()->is("admin/data-realisasis**")? "active open" : "" }} ">
					@can('app_anggaran_access')
					<a href="#" title="Sub-App Anggaran" data-filter-tags="{{ strtolower(trans('cruds.appAnggaran.title')) }}">
						<i class="fal fa-window"></i>
						<span class="nav-link-text" data-i18n="nav.sub_application_sub1">{{ trans('cruds.appAnggaran.title') }}</span>
					</a>
					<ul>
						@can('data_renja_access')
						<li class="{{ request()->is("admin/data-renjas") || request()->is("admin/data-renjas/*") ? "active" : "" }}">
							<a href="{{ route("admin.data-renjas.index") }}" title="{{ trans('cruds.dataRenja.title') }}" data-filter-tags="{{ strtolower(trans('cruds.dataRenja.title')) }}" >
								<span class="nav-link-text " data-i18n="nav.sub_application_sub1_menu1">{{ trans('cruds.dataRenja.title') }}</span>
							</a>
						</li>
						@endcan
						@can('data_pagu_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/data-pagus") || request()->is("admin/data-pagus/*") ? "active" : "" }}">
							<a href="{{ route("admin.data-pagus.index") }}" data-filter-tags="{{ strtolower(trans('cruds.dataPagu.title')) }}">
								<span class="nav-link-text " data-i18n="nav.sub_application_sub1_menu2">{{ trans('cruds.dataPagu.title') }}</span>
							</a>
						</li>
						@endcan
						@can('data_realisasi_access')
						<li class="{{ request()->is("admin/data-realisasis") || request()->is("admin/data-realisasis/*") ? "active" : "" }}">
							<a href="{{ route("admin.data-realisasis.index") }}" data-filter-tags="{{ strtolower(trans('cruds.dataRealisasi.title')) }}">
								<span class="nav-link-text " data-i18n="nav.sub_application_sub1_menu3">
									{{ trans('cruds.dataRealisasi.title') }}
								</span>
							</a>
						</li>
						@endcan
					</ul>
					@endcan
				</li>
			<!-- end sub menu app anggaran -->
			
			<!-- menu banpem -->
				<li class="{{ request()->is("admin/backdate-banpems*") ? "active open" : "" }} ">
					 @can('app_banpem_access')
					<a href="#" title="Sub-App Banpem" data-filter-tags="{{ strtolower(trans('cruds.appBanpem.title')) }}">
						<i class="fal fa-window"></i>
						<span class="nav-link-text" data-i18n="nav.sub_application_sub2">{{ trans('cruds.appBanpem.title') }}</span>
					</a>
					<ul>
						@can('data_banpem_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/backdate-banpems") || request()->is("admin/backdate-banpems/*") ? "active" : "" }}">
							<a href="{{ route("admin.backdate-banpems.index") }}" data-filter-tags="{{ strtolower(trans('cruds.appBanpem.title')) }}">
								<span class="nav-link-text " data-i18n="nav.sub_application_sub2_menu1">
									{{ trans('cruds.dataBanpem.title') }}
								</span>
								
							</a>
						</li>
						@endcan
						
						
					</ul>
					@endcan
				</li>
			<!-- end menu banpem -->
			@endcan
			
			<!-- menu DATA MASTER -->
			@can('master_data_access')
			<li class="nav-title" data-i18n="nav.master_data">DATA INDUK (master)</li>
			<li>
				@can('belanja_access')
				<li class="{{ request()->is("admin/belanjas") || request()->is("admin/belanjas/*") ? "active open" : "" }}">
					<a href="#" title="Data 526xxx" data-filter-tags="data 526 xxx">
						 <i class="fal fa-handshake"></i>
						<span class="nav-link-text" data-i18n="nav.master_data_sub1">Data 526</span>
					</a>
					<ul>
						
						<li class="{{ request()->is("admin/belanjas") || request()->is("admin/belanjas/*") ? "active" : "" }}">
							<a href="{{ route("admin.belanjas.index") }}" data-filter-tags="{{ strtolower(trans('cruds.belanja.title')) }}">
								<span class="nav-link-text" data-i18n="nav.master_data_sub1_menu1">{{ trans('cruds.belanja.title') }}</span>
							</a>
						</li>
						<!-- next li -->
					</ul>
				</li>
				@endcan
				@can('akun_access')
				<li class="{{ request()->is("admin/akuns") || request()->is("admin/akuns/*") ? "active" : "" }}" title="{{ trans('cruds.akun.title') }}" data-filter-tags="{{ strtolower(trans('cruds.akun.title')) }}">
					<a href="{{ route("admin.akuns.index") }}" data-filter-tags="{{ strtolower(trans('cruds.akun.title')) }}">
						 <i class="fal fa-cart-arrow-down"></i>
						<span class="nav-link-text" data-i18n="nav.master_data_sub2">{{ trans('cruds.akun.title') }}</span>
					</a>
				</li>
				@endcan
				<li class="{{ request()->is("admin/provinsis*") || request()->is("admin/kabupatens*") || request()->is("admin/kecamatans*")||request()->is("admin/desas*") ? "active open" : "" }}">
					<a href="#" title="Data Wilayah" data-filter-tags="data wilayah">
						 <i class="fal fa-map c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.master_data_sub3">Data Wilayah</span>
					</a>
					<ul>
						@can('provinsi_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/provinsis") || request()->is("admin/provinsis/*") ? "active" : "" }}">
							<a href="{{ route("admin.provinsis.index") }}" data-filter-tags="{{ strtolower(trans('cruds.provinsi.title')) }}">
								<span class="nav-link-text" data-i18n="nav.master_data_sub3_menu1">{{ trans('cruds.provinsi.title') }}</span>
							
							</a>
						</li>
						@endcan
						@can('kabupaten_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/kabupatens") || request()->is("admin/kabupatens/*") ? "active" : "" }}">
							<a href="{{ route("admin.kabupatens.index") }}" data-filter-tags="{{ strtolower(trans('cruds.kabupaten.title')) }}">
								<span class="nav-link-text" data-i18n="nav.master_data_sub3_menu2">{{ trans('cruds.kabupaten.title') }}</span>
							</a>
						</li>
						@endcan
						@can('kecamatan_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/kecamatans") || request()->is("admin/kecamatans/*") ? "active" : "" }}">
							<a href="{{ route("admin.kecamatans.index") }}" data-filter-tags="{{ strtolower(trans('cruds.kecamatan.title')) }}">
								<span class="nav-link-text" data-i18n="nav.master_data_sub3_menu3">{{ trans('cruds.kecamatan.title') }}</span>
							</a>
						</li>
						@endcan
						@can('desa_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/desas") || request()->is("admin/desas/*") ? "active" : "" }}">
							<a href="{{ route("admin.desas.index") }}" data-filter-tags="{{ strtolower(trans('cruds.desa.title')) }}">
								<span class="nav-link-text" data-i18n="nav.master_data_sub3_menu4">{{ trans('cruds.desa.title') }}</span>
							</a>
						</li>
						@endcan
						<!-- next li -->
					</ul>
				</li>
				@can('satker_access')
				<li class="{{ request()->is("admin/satkers") || request()->is("admin/satkers/*") ? "active" : "" }}">
					<a href="{{ route("admin.satkers.index") }}" title="Daftar Satuan Kerja" data-filter-tags="{{ strtolower(trans('cruds.satker.title')) }}">
						 <i class="fal fa-university c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.master_data_sub4">{{ trans('cruds.satker.title') }}</span>
					</a>
				</li>
				@endcan
				@can('rincian_output_access')
				<li class="{{ request()->is("admin/rincian-outputs") || request()->is("admin/rincian-outputs/*") ? "active" : "" }}">
					<a href="{{ route("admin.rincian-outputs.index") }}" title="Daftar Rincian Output" data-filter-tags="{{ strtolower(trans('cruds.rincianOutput.title')) }}">
						 <i class="fal fa-window-restore c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.master_data_sub5">{{ trans('cruds.rincianOutput.title') }}</span>
					</a>
				</li>
				@endcan
				@can('master_kegiatan_access')
				<li class="c-sidebar-nav-link {{ request()->is("admin/master-kegiatans") || request()->is("admin/master-kegiatans/*") ? "active" : "" }}">
					<a href="{{ route("admin.master-kegiatans.index") }}" title="Daftar Kegiatan" data-filter-tags="{{ strtolower(trans('cruds.masterKegiatan.title')) }}">
						 <i class="fal fa-clipboard-list c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.master_data_sub6">{{ trans('cruds.masterKegiatan.title') }}</span>
					</a>
				</li>
				@endcan
			</li>
			@endcan
			<!-- end menu sub aplikasi -->
			
			<!-- menu settings -->
			@can('user_management_access')
			<li class="nav-title" data-i18n="nav.administation">ADMINISTRATOR</li>
			<li class="{{ request()->is("admin/permissions*")  || request()->is("admin/roles*") || request()->is("admin/users*") || request()->is("admin/audit-logs*")  ? "active open" : "" }}">
				<a href="#" title="User Management" data-filter-tags="{{ strtolower(trans('cruds.userManagement.title')) }}">
					<i class="fal fal fa-users"></i>
					<span class="nav-link-text" data-i18n="nav.administation_sub1">{{ trans('cruds.userManagement.title') }}</span>
				</a>
				<ul>
                    @can('permission_access')
                        <li class="c-sidebar-nav-item {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                            <a href="{{ route("admin.permissions.index") }}" title="Permission" data-filter-tags="{{ strtolower(trans('cruds.permission.title')) }}">
                                <i class="fa-fw fal fa-unlock-alt c-sidebar-nav-icon"></i>
                                <span class="nav-link-text" data-i18n="nav.administation_sub1_menu1">{{ trans('cruds.permission.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                            <a href="{{ route("admin.roles.index") }}" title="Roles" data-filter-tags="{{ strtolower(trans('cruds.role.title')) }}">
                                <i class="fa-fw fal fa-briefcase c-sidebar-nav-icon"></i>
                                <span class="nav-link-text" data-i18n="nav.administation_sub1_menu2">{{ trans('cruds.role.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                            <a href="{{ route("admin.users.index") }}" title="User" data-filter-tags="{{ strtolower(trans('cruds.user.title')) }}">
                                <i class="fa-fw fal fa-user c-sidebar-nav-icon"></i>
								<span class="nav-link-text" data-i18n="nav.administation_sub1_menu3">{{ trans('cruds.user.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                            <a href="{{ route("admin.audit-logs.index") }}" title="Audit Log" data-filter-tags="{{ strtolower(trans('cruds.auditLog.title')) }}">
                                <i class="fa-fw fal fa-file-alt c-sidebar-nav-icon"></i>
								<span class="nav-link-text" data-i18n="nav.administation_sub1_menu4">{{ trans('cruds.auditLog.title') }}</span>
                            </a>
                        </li>
                    @endcan
                </ul>
			</li>
			@endcan
			<!-- end menu settings -->
			
			@php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item {{ request()->is("admin/messenger*") ? "active" : "" }}">
				<a href="{{ route("admin.messenger.index") }}" title="Pesan" data-filter-tags="{{ strtolower(trans('global.messages')) }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
					<i class="fal fal fa-envelope"></i>
					<span class="nav-link-text" data-i18n="nav.administation_sub2">{{ trans('global.messages') }}</span>
					@if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif
				</a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
			@can('profile_password_edit')
			<li class="c-sidebar-nav-item {{ request()->is("profile/password*") ? "active" : "" }}">
				<a href="{{ route('profile.password.edit') }}" title="Ganti Password" data-filter-tags="{{ strtolower(trans('global.change_password')) }}" class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
					<i class="fal fal fa-key"></i>
					<span class="nav-link-text" data-i18n="nav.administation_sub3">{{ trans('global.change_password') }}</span>
				</a>
			</li>
			@endcan
            @endif
			
			<!-- menu documentation -->
			<li class="nav-title"  data-i18n="nav.documentation">Documentations</li>
			<li class="c-sidebar-nav-item">
				<a href="/#" title="Build Control" data-filter-tags="documentation build notes" class="waves-effect waves-themed">
					<i class="fal fa-code"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_sub1">Build Control</span>
				</a>
			</li>
			<li class="c-sidebar-nav-item">
				<a href="/#" title="General Documentation" data-filter-tags="general documentation" class="waves-effect waves-themed">
					<i class="fal fa-code"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_sub2">General Docs</span>
				</a>
			</li>
			<li class="c-sidebar-nav-item {{ request()->is("api/documentation*") ? "active" : "" }}">
				<a href="/api/documentation" title="Rest API Documentation" data-filter-tags="rest api documentation" class="waves-effect waves-themed">
					<i class="fal fa-cloud-download"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_sub3">REST-API Docs</span>
				</a>
			</li>
			<!-- end menu documentation -->
            <li class="c-sidebar-nav-item">
				<a href="{{ route('logout')}}" title="Logout" data-filter-tags="logout" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
					<i class="fal fal fa-sign-out-alt"></i>
					<span class="nav-link-text" data-i18n="drpdwn.page-logout">{{ trans('global.logout') }}</span>
				</a>
            </li>
		</ul>
		<div class="filter-message js-filter-message bg-success-600"></div>
	</nav>
	<!-- END PRIMARY NAVIGATION -->
	<!-- NAV FOOTER -->
	<div class="nav-footer shadow-top">
		<a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
			<i class="ni ni-chevron-right"></i>
			<i class="ni ni-chevron-right"></i>
		</a>
		<ul class="list-table m-auto nav-footer-buttons">
			<li>
				<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat (coming soon)">
					<i class="fal fa-comments"></i>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="chat bantuan (coming soon)">
					<i class="fal fa-life-ring"></i>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="buat panggilan (coming soon)">
					<i class="fal fa-phone"></i>
				</a>
			</li>
		</ul>
	</div> <!-- END NAV FOOTER -->
</aside>
<!-- END Left Aside -->