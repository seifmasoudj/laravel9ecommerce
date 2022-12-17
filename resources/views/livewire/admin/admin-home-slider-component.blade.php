<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display:block !important;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Sliders                
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">                                    
                                    Add New Sliders                
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slide.add') }}" class="btn btn-success float-end">Add New Sliders</a>
                                    </div>
                                </div> 
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Top Title</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Offer</th>
                                            <th>Link</th>                                            
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($slides as $slide )
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td><img src="{{ asset('asset/imgs/slider') }}/{{ $slide->image }}" width="80" /></td>
                                                <td>{{ $slide->top_title }}</td>
                                                <td>{{ $slide->title }}</td>
                                                <td>{{ $slide->sub_title }}</td>
                                                <td>{{ $slide->offer }}</td>
                                                <td>{{ $slide->link }}</td>                                               
                                                <td>{{ $slider->status =  1 ? 'Active':'Inactive'}}</td>
                                                <td>{{ $slider->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.home.slide.edit',['slide_id'=>$slide->id]) }}" class="text-info">Edit</a>
                                                    <a href="#" class="text-danger" onclick="deleteConfirmation({{ $slide_id }})" style="margin-left: 20px;">Delete</a>
                                                </td>
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-30">Do you want to delete this record!</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('category_id',id);
            $('#deleteConfirmation').modal('show');
        } 

        function deleteCategory()
        {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush