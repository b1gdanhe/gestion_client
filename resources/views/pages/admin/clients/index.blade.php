@extends('layouts.admin.layout')
@section('admin-content')
<div class="card overflow-hidden">
    <div class="card-header">
        <h4 class="card-title">Clients</h4>
    </div>
    <div>
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-default-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-sm text-default-500">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-sm text-default-500">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-sm text-default-500">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-end text-sm text-default-500">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-default-200">
                            <tr class="hover:bg-default-100">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    Lindsay Walton</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    Front-end Developer </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    lindsay.walton@example.com</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a class="text-primary hover:text-primary-700" href="#">Delete</a>
                                </td>
                            </tr>

                            <tr class="hover:bg-default-100">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    Courtney Henry</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    Designer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    courtneyhenry@example.com</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a class="text-primary hover:text-primary-700" href="#">Delete</a>
                                </td>
                            </tr>

                            <tr class="hover:bg-default-100">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    Tom Cook</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    Director of Product</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    tom.cook@example.com</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a class="text-primary hover:text-primary-700" href="#">Delete</a>
                                </td>
                            </tr>

                            <tr class="hover:bg-default-100">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    Whitney Francis</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    Copywriter</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    whitney.francis@example.com</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a class="text-primary hover:text-primary-700" href="#">Delete</a>
                                </td>
                            </tr>

                            <tr class="hover:bg-default-100">
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    Leonard Krasner</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    Front-end Developer </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">
                                    leonard.krasner@example.com</td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                    <a class="text-primary hover:text-primary-700" href="#">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!

@endsection
