<x-app-layout>
    <div class="py-12 bg-gray-100" id="app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-4 bg-white border-b border-gray-200">
                    <div class="max-w-2xl mx-auto px-4 sm:py-22 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div>
                            <h3>Your transaction has been {{ $order->state }}</h3>
                            <table>
                                <thead class="bg-gray-100">
                                    <th>Description Transation</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Reference</td>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{'payment #'.$order->id}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <p>Tienes un pago pendiente deseas Reintentarlo? </p>
                        <button class="px-6 text-sm text-white bg-indigo-500 hover:bg-indigo-600">
                            <a href="pendings" type="button">Proceed to Checkout</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
