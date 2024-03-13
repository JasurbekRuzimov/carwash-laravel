<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Navbat
        </h2>
    </x-slot>

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
                            @foreach($orders as $order)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->user->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->from}}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $order->to}}</td>
                                @if(isset(auth()->user()->role))
                                    @if(auth()->user()->role=='admin')
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                    <form action="{{route('site.destroyOrder', $order->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">O'chirish</button>
                                    </form>
                                    </td>
                            @endif
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
