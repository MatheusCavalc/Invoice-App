<div>
    <script src="https://cdn.tailwindcss.com"></script>

    <div class="flex w-full justify-end mb-8">
        <div class="">
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2.5 me-2 mb-2 flex gap-2">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>

                Download Invoice
            </button>
        </div>
    </div>

    <section class="py-20 bg-black">
        <div class="max-w-5xl mx-auto py-10 bg-white">
            <article class="overflow-hidden">
                <div class="bg-[white] rounded-b-md">
                    <div class="p-9 flex justify-between">
                        <div>
                            <p class="text-4xl font-bold">Invoice #{{ $invoice->number }}</p>

                            <p class="mt-2 font-light text-xl">{{ $invoice->issue_date }}</p>
                        </div>

                        <div class="text-slate-700">
                            <div class="flex justify-end">
                                <img class="object-cover h-12"
                                    src="https://pbs.twimg.com/profile_images/1513243060834123776/dL8-d7zI_400x400.png" />
                            </div>
                        </div>
                    </div>
                    <div class="px-9">
                        <div class="flex w-2/3 justify-between">
                            <div class="font-light text-slate-700">
                                <p class="font-normal text-slate-500 italic">Billed From</p>
                                <p>{{ \App\Models\Client::where('id', $invoice->client_id)->first()->name }}
                                </p>
                                <p>{{ \App\Models\Client::where('id', $invoice->client_id)->first()->email }}
                                </p>
                                <p>Frisco</p>
                                <p>{{ \App\Models\Client::where('id', $invoice->client_id)->first()->phone }}
                                </p>
                            </div>

                            <div class="font-light text-slate-700">
                                <p class="font-normal text-slate-500 italic">Billed To</p>
                                <p>My Company</p>
                                <p>Store 1463</p>
                                <p>Frisco</p>
                                <p>CA 0000</p>
                            </div>
                        </div>
                    </div>

                    <div class="px-9 pt-14">
                        <div class="flex flex-col mx-0 mt-2">
                            <table class="min-w-full divide-y divide-slate-500">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                            Product
                                        </th>
                                        <th scope="col"
                                            class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                            Quantity
                                        </th>
                                        <th scope="col"
                                            class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                            Rate
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                            Amount
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($invoice->items as $itemList)
                                        <tr class="border-b border-slate-200">
                                            <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                <div class="font-medium text-slate-700">{{ $itemList['item'] }}</div>
                                                <div class="mt-0.5 text-slate-500 sm:hidden">
                                                    1 unit at $0.00
                                                </div>
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                {{ $itemList['quantity'] }}
                                            </td>
                                            <td
                                                class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                ${{ $itemList['price'] }}
                                            </td>
                                            <td
                                                class="py-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                ${{ $itemList['total'] }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="row" colspan="3"
                                            class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                                            Subtotal
                                        </th>
                                        <th scope="row"
                                            class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                                            Subtotal
                                        </th>
                                        <td class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                            ${{ $invoice->total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3"
                                            class="hidden pt-6 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                                            Discount
                                        </th>
                                        <th scope="row"
                                            class="pt-6 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                                            Discount
                                        </th>
                                        <td class="pt-6 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                            $0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3"
                                            class="hidden pt-4 pl-6 pr-3 text-sm font-light text-right text-slate-500 sm:table-cell md:pl-0">
                                            Tax
                                        </th>
                                        <th scope="row"
                                            class="pt-4 pl-4 pr-3 text-sm font-light text-left text-slate-500 sm:hidden">
                                            Tax
                                        </th>
                                        <td class="pt-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                            $0.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="3"
                                            class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                            Total
                                        </th>
                                        <th scope="row"
                                            class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                            Total
                                        </th>
                                        <td
                                            class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                            ${{ $invoice->total }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="mt-48 p-9">
                        <div class="border-t pt-9 border-slate-200">
                            <div class="text-sm font-light text-slate-700">
                                <p>
                                    Payment terms are 14 days. Please be aware that according to the
                                    Late Payment of Unwrapped Debts Act 0000, freelancers are
                                    entitled to claim a 00.00 late fee upon non-payment of debts
                                    after this time, at which point a new invoice will be submitted
                                    with the addition of this fee. If payment of the revised invoice
                                    is not received within a further 14 days, additional interest
                                    will be charged to the overdue account and a statutory rate of
                                    8% plus Bank of England base of 0.5%, totalling 8.5%. Parties
                                    cannot contract out of the Act’s provisions.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
