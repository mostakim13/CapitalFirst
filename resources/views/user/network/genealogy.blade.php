@extends('layouts.user.master')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body container">

                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">{{ Auth::user()->left_count }}</h5>
                                <p class="card-text text-white"><i class="bi bi-diagram-2 text-danger"></i> Left Members</p>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning bg-secondary text-white">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4 text-white">0</h5>
                                <p class="card-text text-white"><i class="bi bi-diagram-2 text-danger"></i> Left Bonus
                                    Points</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">{{ Auth::user()->right_count }}</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-danger"></i> Right Members</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-20 col-6">
                        <div class="card border-left-warning text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title p-0 pt-4">0</h5>
                                <p class="card-text"><i class="bi bi-diagram-2 text-success"></i> Right Bonus Points
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form>
                                <div class="card-body p-4 bg-danger">
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <input type="text" name="left_search" id="left_search" value=""
                                                class="search form-control" placeholder="start search here">
                                            <small class="pl-2 text-uppercase font-weight-bold text-white">search</small>
                                            <input type="hidden" name="type" value="left">
                                        </div>
                                        <div class="col-md-5 bg-danger">
                                            <select name="left_rank" id="left_rank" class="search form-control">
                                                <option value="">choose option</option>
                                                <option value="STARTER" class="text-uppercase">STARTER</option>
                                                <option value="BRONZE" class="text-uppercase">BRONZE</option>
                                                <option value="SILVER" class="text-uppercase">SILVER</option>
                                                <option value="GOLD" class="text-uppercase">GOLD</option>
                                                <option value="PLATINUM" class="text-uppercase">PLATINUM</option>
                                                <option value="COORDINATOR" class="text-uppercase">COORDINATOR</option>
                                                <option value="EXECUTIVE" class="text-uppercase">EXECUTIVE</option>
                                                <option value="SENIOR EXECUTIVE" class="text-uppercase">SENIOR EXECUTIVE
                                                </option>
                                                <option value="DIRECTOR" class="text-uppercase">DIRECTOR</option>
                                                <option value="MARKETING DIRECTOR" class="text-uppercase">MARKETING DIRECTOR
                                                </option>
                                                <option value="NATIONAL MARKETING DIRECTOR" class="text-uppercase">NATIONAL
                                                    MARKETING DIRECTOR</option>
                                                <option value="REGIONAL MARKETING DIRECTOR" class="text-uppercase">REGIONAL
                                                    MARKETING DIRECTOR</option>
                                                <option value="DIAMOND" class="text-uppercase">DIAMOND</option>
                                                <option value="ROYAL DIAMOND" class="text-uppercase">ROYAL DIAMOND</option>
                                            </select>
                                            <small class="pl-2 text-uppercase font-weight-bold text-white">Ranks</small>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-warning btn-sm float-end w-100 py-2">Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card border-top-warning  border-bottom-warning bg-warning text-white">
                            <div class="card-body text-white">
                                <h5 class="card-title text-white"><i class="bi bi-person-square text-danger"></i> Left
                                    Members</h5>
                                <table class="table table-hover">
                                    <thead class="text-black">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Deposit</th>
                                            <th scope="col">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @php
                                            $child_lefts = Auth::user()
                                                ->placements->where('position', 1)
                                                ->get();
                                        @endphp
                                        @foreach ($child_lefts as $child_left)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    {{ $child_left->name }}
                                                </td>

                                                <td>25040</td>
                                                <td>STARTER</td>
                                            </tr>
                                            @if ($child_lefts == null)
                                                <tr>
                                                    <td>No data</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <form>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-5">
                                            <input type="text" name="right_search" id="right_search" value=""
                                                class="search form-control" placeholder="start search here">
                                            <input type="hidden" name="type" value="right">
                                            <small class="pl-2 text-uppercase font-weight-bold ">search</small>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="right_rank" id="right_rank" class="search form-control">
                                                <option value="">choose option</option>
                                                <option value="STARTER" class="text-uppercase">STARTER</option>
                                                <option value="BRONZE" class="text-uppercase">BRONZE</option>
                                                <option value="SILVER" class="text-uppercase">SILVER</option>
                                                <option value="GOLD" class="text-uppercase">GOLD</option>
                                                <option value="PLATINUM" class="text-uppercase">PLATINUM</option>
                                                <option value="COORDINATOR" class="text-uppercase">COORDINATOR</option>
                                                <option value="EXECUTIVE" class="text-uppercase">EXECUTIVE</option>
                                                <option value="SENIOR EXECUTIVE" class="text-uppercase">SENIOR EXECUTIVE
                                                </option>
                                                <option value="DIRECTOR" class="text-uppercase">DIRECTOR</option>
                                                <option value="MARKETING DIRECTOR" class="text-uppercase">MARKETING DIRECTOR
                                                </option>
                                                <option value="NATIONAL MARKETING DIRECTOR" class="text-uppercase">NATIONAL
                                                    MARKETING DIRECTOR</option>
                                                <option value="REGIONAL MARKETING DIRECTOR" class="text-uppercase">REGIONAL
                                                    MARKETING DIRECTOR</option>
                                                <option value="DIAMOND" class="text-uppercase">DIAMOND</option>
                                                <option value="ROYAL DIAMOND" class="text-uppercase">ROYAL DIAMOND</option>
                                            </select>
                                            <small class="pl-2 text-uppercase font-weight-bold ">Ranks</small>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-warning btn-sm float-end w-100 py-2">Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        @php
                            $child_rights = Auth::user()
                                ->placements->where('position', 2)
                                ->get();
                        @endphp

                        <div class="card border-top-warning  border-bottom-warning bg-info">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bi bi-person-square text-success"></i> Right Members
                                </h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Deposit</th>
                                            <th scope="col">Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($child_rights as $child_right)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $child_right->name }}</td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
