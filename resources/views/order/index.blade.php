<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Navbat
        </h2>
    </x-slot>

    <div class="d-flex justify-content-center">
        @foreach($errors->all() as $error)
            <div class="bg-red-300 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Xatolik!</strong>
                <span class="block sm:inline">{{ $error }}</span>
            </div>
        @endforeach
    </div>
    @if(session('success'))
        <div class="bg-green-300 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Muvaffaqiyatli!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end">
                        <a href="{{ route('site.createOrder', $moyka->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Navbatga yozilish</a>
                    </div>
                    <div class="flex justify-center">
                        <h1 class="text-2xl font-bold">Moyka: {{$moyka->name}} / {{$moyka->address}} </h1>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Mijoz</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Boshlanish vaqti</th>
                                <th class="px-6 py-3 bg-gray-50"> Tugash vaqti</th>
                                @if(isset(auth()->user()->role))
                                @if(auth()->user()->role=='admin')
                                    <th class="px-6 py-3 bg-gray-50"></th>
                                    @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                        @foreach($orders as $index => $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $loop->iteration  }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->user->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->from }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->to }}</td>
                                @if(isset(auth()->user()->role) && auth()->user()->role == 'admin')
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <form action="{{ route('site.destroyOrder', $order->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">O'chirish</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
