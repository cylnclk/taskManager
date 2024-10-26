<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Görevlerim

            <a href="{{ route('tasks.index') }}" style="float: right; margin: 2px">
                <button class="btn btn-info">Görevlerim</button>
            </a>
            <a href="{{ route('my.task') }}" style="float: right; margin: 2px">
                <button class="btn btn-dark">Eklediğim Görevler</button>
            </a>
            <a href="{{ route('tasks.create') }}" style="float: right; margin: 2px">
                <button class="btn btn-success">Yeni Görev</button>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Görev</th>
                            <th style="text-align: center">Durum</th>
                            <th>Açıklama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td style="text-align: center">
                                    @if($task->status == 'new')
                                        <span class="badge badge-info">Yeni</span>
                                    @elseif($task->status == 'process')
                                        <span class="badge badge-primary">İşlemde</span>
                                    @elseif($task->status == 'completed')
                                        <span class="badge badge-success">Tamamlandı</span>
                                    @endif
                                </td>
                                <td>{{ $task->description }}</td>
                                <td>

                                    <a href="{{ route('task.completed',$task->id) }}" style="text-decoration: none">
                                        <button class="btn btn-success btn-sm">
                                            Tamamla
                                        </button>
                                    </a>

                                    <a href="{{ route('tasks.edit',$task->id) }}" style="text-decoration: none">
                                        <button class="btn btn-warning btn-sm">
                                            Güncelle
                                        </button>
                                    </a>


                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Görevi silmek istediğinize emin misiniz?');">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
