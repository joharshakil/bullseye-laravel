@extends('layouts.main')

@section('content')

    <section class="content-header">
        <h1>
           Users
            <!--small>it all starts here</small-->
        </h1>
    </section>



<section class="content">

    <!-- Default box -->
    <div class="box">
        <table class="table text-center"  id="users-table">
            <tr class="red">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>crated date</th>
                {{--<th>Actions</th>--}}
            </tr>

        </table>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    @endsection

    @section('scripts')
        <script>
            $(function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('datatables.data') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' }
                    ]
                });
            });
        </script>
@endsection
</section>