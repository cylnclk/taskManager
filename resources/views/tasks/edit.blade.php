<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Görev Düzenle
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('tasks.update',$task->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="name">Görev:</label>
                            <input type="text" name="name" value="{{ $task->name ?? ''}}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Açıklama:</label>
                            <textarea name="description" class="form-control" rows="3" required> {{ $task->description ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="user">Atanacak Kişi Seçiniz</label>
                            <select name="user_id" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ count($task->users)>0 && $task->users[0]['id']==$user->id ? 'selected':'' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Durum</label>
                            <select name="status" class="form-control">
                                <option value="new" {{ $task->status == 'new' ? 'selected':'' }}>Yeni Görev</option>
                                <option value="process" {{ $task->status == 'process' ? 'selected':'' }}>İşlemde</option>
                                <option value="completed" {{ $task->status == 'completed' ? 'selected':'' }}>Tamamlandı</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
