@extends('layouts.master')
@include('layouts.modals.modal-sm')
@include('layouts.modals.modal-lg')
@include('layouts.modals.modal-md')

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-list-view.css') }}">
@endpush

@section('content')
    <div class="content-body">
        <!-- Data list view starts -->
        <section id="data-list-view" class="data-list-view-header">
            <div class="action-btns d-none">
                <div class="btn-dropdown mr-1 mb-1">
                    <div class="btn-group dropdown actions-dropodown">
                        <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                            <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                            <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                            <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DataTable starts -->
            <div class="table-responsive">
                <table class="table data-list-view">
                    <thead>
                        <tr>
                            <th></th>
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th>POPULARITY</th>
                            <th>ORDER STATUS</th>
                            <th>PRICE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="product-name">Apple Watch series 4 GPS</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-success">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:97%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$69.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Beats HeadPhones</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:83%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-success">
                                    <div class="chip-body">
                                        <div class="chip-text">Delivered</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$69.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Altec Lansing - Bluetooth Speaker</td>
                            <td class="product-category">Audio</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:57%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-danger">
                                    <div class="chip-body">
                                        <div class="chip-text">canceled</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Aluratek - Bluetooth Audio Receiver</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:65%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$29.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Aluratek - Bluetooth Audio Transmitter</td>
                            <td class="product-category">Audio</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:87%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-danger">
                                    <div class="chip-body">
                                        <div class="chip-text">canceled</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Basis - Peak Fitness and Sleep Tracker</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:47%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Antec - Nano Diamond Thermal Compound</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:55%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-primary">
                                    <div class="chip-body">
                                        <div class="chip-text">pending</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$29.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Antec - SmartBean Bluetooth Adapter</td>
                            <td class="product-category">Computer</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:63%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-danger">
                                    <div class="chip-body">
                                        <div class="chip-text">canceled</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$39.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Beats by Dr. Dre - 3' USB-to-Micro USB Cable</td>
                            <td class="product-category">Computer</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:87%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-success">
                                    <div class="chip-body">
                                        <div class="chip-text">delivered</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Beats by Dr. Dre - Bike Mount for Pill Speakers</td>
                            <td class="product-category">Audio</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:40%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">delivered</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$49.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Bose® - SoundLink® Color Bluetooth Speaker</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:90%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-primary">
                                    <div class="chip-body">
                                        <div class="chip-text">pending</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$129.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">BRAVEN - Portable Bluetooth Speaker</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:87%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Craig - Portable Wireless Speaker</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-danger">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:20%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-danger">
                                    <div class="chip-body">
                                        <div class="chip-text">canceled</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Definitive Technology - Wireless Speaker</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:75%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-primary">
                                    <div class="chip-body">
                                        <div class="chip-text">pending</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$399.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Fitbit - Charge HR Activity Tracker + Heart Rate (Large)</td>
                            <td class="product-category">Audio</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:60%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-primary">
                                    <div class="chip-body">
                                        <div class="chip-text">pending</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$149.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Fitbit - Flex 1" USB Charging Cable</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:87%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$14.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Fitbit - Activity Tracker</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-danger">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:35%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-danger">
                                    <div class="chip-body">
                                        <div class="chip-text">canceled</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$99.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Fitbit - Charge Wireless Activity Tracker (Large)</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:87%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-primary">
                                    <div class="chip-body">
                                        <div class="chip-text">pending</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$129.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Craig - Tower Speaker</td>
                            <td class="product-category">Audio</td>
                            <td>
                                <div class="progress progress-bar-warning">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:68%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$69.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">BRAVEN - Outdoor Speaker</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:97%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-success">
                                    <div class="chip-body">
                                        <div class="chip-text">delivered</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Bose® - Bluetooth Speaker Travel Bag</td>
                            <td class="product-category">Computers</td>
                            <td>
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:89%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-warning">
                                    <div class="chip-body">
                                        <div class="chip-text">on hold</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$44.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="product-name">Altec Lansing - Mini H2O Bluetooth Speaker</td>
                            <td class="product-category">Fitness</td>
                            <td>
                                <div class="progress progress-bar-success">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40"
                                        aria-valuemax="100" style="width:87%"></div>
                                </div>
                            </td>
                            <td>
                                <div class="chip chip-success">
                                    <div class="chip-body">
                                        <div class="chip-text">delivered</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-price">$199.99</td>
                            <td class="product-action">
                                <span class="action-edit"><i class="feather icon-edit"></i></span>
                                <span class="action-delete"><i class="feather icon-trash"></i></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <!-- DataTable ends -->
@endsection



@push('script')
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/ui/data-list-view.js') }}"></script>
@endpush
