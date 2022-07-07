<!-- BEGIN Left Aside -->
<aside class="page-sidebar">
	<div class="page-logo">
		<a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
			<img src="{{ asset('img/logo-icon.png') }}" alt="SiMEvI WebApp" aria-roledescription="logo">
			<span class="page-logo-text mr-1">SiMEvI WebApp</span>
			<span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
			<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
		</a>
	</div>
	<!-- BEGIN PRIMARY NAVIGATION -->
	<nav id="js-primary-nav" class="primary-nav" role="navigation">
		
		<div class="nav-filter">
			<div class="position-relative">
				<input type="text" id="nav_filter_input" placeholder="Filter menu" class=' <select class="searchable-field form-control">

            </select>' tabindex="0">
				<a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
					<i class="fal fa-chevron-up"></i>
				</a>
			</div>
		</div>
		<div class="info-card">
			<img src="{{ asset('img/favicon.png') }}" class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
			<div class="info-card-text">
				<a href="#" class="d-flex align-items-center text-white">
					<span class="text-truncate text-truncate-sm d-inline-block">
						{{ Auth::user()->name }}
					</span>
				</a>
				<span class="d-inline-block text-truncate text-truncate-sm">Simevi Administrator</span>
			</div>
			<img src="{{ asset('img/cover-7-lg.png') }}" class="cover" alt="cover">
			<a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input" >
				<i class="fal fa-angle-down"></i>
			</a>
		</div>
		<ul id="js-nav-menu" class="nav-menu">
			<!-- menu dashboard -->
			<li class="nav-title">PEMANTAUAN & ANALISA</li>
			<li class="">
				<a href="#" data-filter-tags="{{ trans('global.dashboard') }}">
					<i class="fal fa-chart-bar"></i>
					<span class="nav-link-text" data-i18n="nav.dashboard">{{ trans('global.dashboard') }} Pemantauan</span>
				</a>
				<ul>
					@can('dashboard_access')
					<li class="">
						<a href="{{ route("admin.home") }}" title="Dashboard" data-filter-tags="main dashboard">
							<span class="nav-link-text" data-i18n="nav.main_dashboard">{{ trans('global.dashboard') }}</span>
						</a>
					</li>
					@endcan
					@can('dashboardvip_access')
					<li class="c-sidebar-nav-item {{ request()->is("admin/vip*") ? "c-show" : "" }} {{ request()->is("admin/vip*") ? "c-show" : "" }}">
						<a href="{{ route("admin.dashboardvip") }}" title="Ringkasan Eksekutif" data-filter-tags="dashhboard_vip" >
							<span class="nav-link-text" data-i18n="nav.dashboaard_vip">{{ trans('cruds.dashboardvip.title') }}</span>
						</a>
					</li>
					@endcan
				</ul>
			</li>
			<li>
				<a href="#" title="Dashboard Analisa" data-filter-tags="dashboard analisa">
					<i class="fal fa-chart-line"></i>
					<span class="nav-link-text" data-i18n="nav.dashboard_analisa">Dashboard Analisa</span>
				</a>
				<ul>
					@can('kinerja_serapan_access')
					<li class="c-sidebar-nav-link {{ request()->is("admin/detailserapan") || request()->is("admin/detailserapan/*") ? "c-active" : "" }}">
						<a href="{{ route("admin.detailserapan") }}" title="kinerja serapan" data-filter-tags="kinerja serapan" >
							<span class="nav-link-text" data-i18n="nav.kinerja_serapan">
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
			<li class="nav-title">Sub-{{ trans('cruds.appConnection.title') }}</li>
			
			<!-- sub menu app anggaran -->
				<li class="{{ request()->is("admin/data-pagus*") ? "c-show" : "" }} {{ request()->is("admin/detail-pagus*") ? "c-show" : "" }} {{ request()->is("admin/data-realisasis*") ? "c-show" : "" }} {{ request()->is("admin/detail-realisasis*") ? "c-show" : "" }} {{ request()->is("admin/outstandings*") ? "c-show" : "" }} {{ request()->is("admin/detail-outstandings*") ? "c-show" : "" }} {{ request()->is("admin/kinerja-serapans*") ? "c-show" : "" }}"">
					@can('app_anggaran_access')
					<a href="#" title="Sub-App Anggaran" data-filter-tags="sub-app anggaran">
						<i class="fal fa-window"></i>
						<span class="nav-link-text" data-i18n="nav.sub_app_anggaran">{{ trans('cruds.appAnggaran.title') }}</span>
					</a>
					<ul>
						<li class="{{ request()->is("admin/data-renjas") || request()->is("admin/data-renjas/*") ? "c-active" : "" }}">
							@can('data_renja_access')
							<a href="{{ route("admin.data-renjas.index") }}" data-filter-tags="rencana_kerja" >
								<span class="nav-link-text " data-i18n="nav.sub_app_renja">{{ trans('cruds.dataRenja.title') }}</span>
							</a>
							@endcan
						</li>
						<li class="c-sidebar-nav-link {{ request()->is("admin/data-pagus") || request()->is("admin/data-pagus/*") ? "c-active" : "" }}">
							@can('data_pagu_access')
							<a href="{{ route("admin.data-pagus.index") }}">
								<span class="nav-link-text " data-i18n="nav.sub_app_pagu">{{ trans('cruds.dataPagu.title') }}</span>
							</a>
							@endcan
						</li>
						@can('data_realisasi_access')
						<li class="{{ request()->is("admin/data-realisasis") || request()->is("admin/data-realisasis/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.data-realisasis.index") }}">
								<span class="nav-link-text " data-i18n="nav.sub_app_realisasi">
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
				<li class="{{ request()->is("admin/data-banpem*") ? "c-show" : "" }} "">
					 @can('app_banpem_access')
					<a href="#" title="Sub-App Banpem" data-filter-tags="sub-app banpem">
						<i class="fal fa-window"></i>
						<span class="nav-link-text" data-i18n="nav.sub_app_banpem">{{ trans('cruds.appBanpem.title') }}</span>
					</a>
					<ul>
						@can('data_banpem_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/data-banpem") || request()->is("admin/data-banpem/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.backdate-banpems.index") }}">
								{{ trans('cruds.dataBanpem.title') }}
							</a>
						</li>
						<li></li>
						@endcan
					</ul>
					@endcan
				</li>
			<!-- end menu banpem -->
			@endcan
			
			<!-- menu DATA MASTER -->
			@can('master_data_access')
			<li class="nav-title">DATA INDUK (master)</li>
			<li>
				@can('backdate_banpem_access')
				<li>
					<a href="javascript:void(0);" title="Data 526xxx" data-filter-tags="data 526 xxx">
						 <i class="fal fa-handshake"></i>
						<span class="nav-link-text" data-i18n="nav.data_526">Data 526</span>
					</a>
					<ul>
						<li class="c-sidebar-nav-link {{ request()->is("admin/backdate-banpems") || request()->is("admin/backdate-banpems/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.backdate-banpems.index") }}">
								{{ trans('cruds.backdateBanpem.title') }}
							</a>
						</li>
						<li class="c-sidebar-nav-link {{ request()->is("admin/belanjas") || request()->is("admin/belanjas/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.belanjas.index") }}">
								{{ trans('cruds.belanja.title') }}
							</a>
						</li>
						<!-- next li -->
					</ul>
				</li>
				@endcan
				@can('akun_access')
				<li class="{{ request()->is("admin/akuns") || request()->is("admin/akuns/*") ? "c-active" : "" }}" title="{{ trans('cruds.akun.title') }}" data-filter-tags="{{ trans('cruds.akun.title') }}">
					<a href="{{ route("admin.akuns.index") }}">
						 <i class="fal fa-cart-arrow-down"></i>
						<span class="nav-link-text" data-i18n="daftar_akun_belanja">{{ trans('cruds.akun.title') }} Belanja</span>
					</a>
				</li>
				@endcan
				<li>
					<a href="javascript:void(0);" title="Data Wilayah" data-filter-tags="data wilayah">
						 <i class="fal fa-map c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.data_wilayah">Data Wilayah</span>
					</a>
					<ul>
						@can('provinsi_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/provinsis") || request()->is("admin/provinsis/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.provinsis.index") }}">
							{{ trans('cruds.provinsi.title') }}
							</a>
						</li>
						@endcan
						@can('kabupaten_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/kabupatens") || request()->is("admin/kabupatens/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.kabupatens.index") }}">
							{{ trans('cruds.kabupaten.title') }}
							</a>
						</li>
						@endcan
						@can('kecamatan_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/kecamatans") || request()->is("admin/kecamatans/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.kecamatans.index") }}">
								{{ trans('cruds.kecamatan.title') }}
							</a>
						</li>
						@endcan
						@can('desa_access')
						<li class="c-sidebar-nav-link {{ request()->is("admin/desas") || request()->is("admin/desas/*") ? "c-active" : "" }}">
							<a href="{{ route("admin.desas.index") }}">
							{{ trans('cruds.desa.title') }}
							</a>
						</li>
						@endcan
						<!-- next li -->
					</ul>
				</li>
				@can('satker_access')
				<li class="c-sidebar-nav-link {{ request()->is("admin/satkers") || request()->is("admin/satkers/*") ? "c-active" : "" }}">
					<a href="{{ route("admin.satkers.index") }}" title="Daftar Satuan Kerja" data-filter-tags="data satker">
						 <i class="fal fa-university c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.data_satker">{{ trans('cruds.satker.title') }}</span>
					</a>
				</li>
				@endcan
				@can('rincian_output_access')
				<li class="{{ request()->is("admin/rincian-outputs") || request()->is("admin/rincian-outputs/*") ? "c-active" : "" }}">
					<a href="{{ route("admin.rincian-outputs.index") }}" title="Daftar Rincian Output" data-filter-tags="daftar rincian output">
						 <i class="fal fa-window-restore c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.daftar_rincian_output">{{ trans('cruds.rincianOutput.title') }}</span>
					</a>
				</li>
				@endcan
				@can('master_kegiatan_access')
				<li class="c-sidebar-nav-link {{ request()->is("admin/master-kegiatans") || request()->is("admin/master-kegiatans/*") ? "c-active" : "" }}">
					<a href="{{ route("admin.master-kegiatans.index") }}" title="Daftar Kegiatan" data-filter-tags="daftar kegiatan">
						 <i class="fal fa-clipboard-list c-sidebar-nav-icon"></i>
						<span class="nav-link-text" data-i18n="nav.daftar_kegiatan">{{ trans('cruds.masterKegiatan.title') }}</span>
					</a>
				</li>
				@endcan
			</li>
			@endcan
			<!-- end menu sub aplikasi -->
			
			<!-- menu settings -->
			@can('user_management_access')
			<li class="nav-title">Settings</li>
			<li class="{{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
				<a href="#" title="User Management" data-filter-tags="user management">
					<i class="fal fal fa-users"></i>
					<span class="nav-link-text" data-i18n="nav.user_management">{{ trans('cruds.userManagement.title') }}</span>
				</a>
				<ul>
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fal fa-unlock-alt c-sidebar-nav-icon"></i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fal fa-briefcase c-sidebar-nav-icon"></i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fal fa-user c-sidebar-nav-icon"></i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fal fa-file-alt c-sidebar-nav-icon"></i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
			</li>
			@endcan
			<!-- end menu settings -->
			
			@php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
				<a href="{{ route("admin.messenger.index") }}" title="Pesan" data-filter-tags="pesan" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }}">
					<i class="fal fal fa-envelope"></i>
					<span class="nav-link-text" data-i18n="nav.pesan">{{ trans('global.messages') }}</span>
					@if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif
				</a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
			@can('profile_password_edit')
			<li class="c-sidebar-nav-item">
				<a href="{{ route('profile.password.edit') }}" title="Ganti Password" data-filter-tags="change password" class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}">
					<i class="fal fal fa-key"></i>
					<span class="nav-link-text" data-i18n="nav.change_password">{{ trans('global.change_password') }}</span>
				</a>
			</li>
			@endcan
            @endif
			
			<!-- menu dashboard -->
			<li class="nav-title">Documentations</li>
			<li class="c-sidebar-nav-item">
				<a href="/#" title="Build Control" data-filter-tags="documentation build notes" class="waves-effect waves-themed">
					<i class="fal fa-code"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_build_control">Build Control</span>
				</a>
			</li>
			<li class="c-sidebar-nav-item">
				<a href="/#" title="General Documentation" data-filter-tags="general documentation" class="waves-effect waves-themed">
					<i class="fal fa-code"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_general_docs">General Docs</span>
				</a>
			</li>
			<li class="c-sidebar-nav-item">
				<a href="/#" title="General Documentation" data-filter-tags="general documentation" class="waves-effect waves-themed">
					<i class="fal fa-book"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_general_docs">General Docs</span>
				</a>
			</li>
			<li class="c-sidebar-nav-item">
				<a href="/#" title="Rest API Documentation" data-filter-tags="rest api documentation" class="waves-effect waves-themed">
					<i class="fal fa-cloud-download"></i>
					<span class="nav-link-text" data-i18n="nav.documentation_rest_api">REST-API Docs</span>
				</a>
			</li>
			<!-- end menu documentation -->
            <li class="c-sidebar-nav-item">
				<a href="{{ route('logout')}}" title="Logout" data-filter-tags="logout" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
					<i class="fal fal fa-sign-out-alt"></i>
					<span class="nav-link-text" data-i18n="nav.logout">{{ trans('global.logout') }}</span>
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