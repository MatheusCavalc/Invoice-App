<x-filament-panels::page>
    <script src="https://cdn.tailwindcss.com"></script>

    <section class="py-20 bg-black">
        <div class="max-w-5xl mx-auto py-10 bg-white">
            <article class="overflow-hidden">
                <div class="bg-[white] rounded-b-md">
                    <div class="p-9 flex justify-between">
                        <div>
                            <p class="text-4xl font-bold">Invoice #{{ $this->record->number }}</p>
                        </div>

                        <div class="text-slate-700">
                            <div class="flex justify-end">
                                <img class="object-cover h-12"
                                    src="https://pbs.twimg.com/profile_images/1513243060834123776/dL8-d7zI_400x400.png" />
                            </div>

                            <p class="text-2xl font-extrabold tracking-tight font-body mt-4 text-right">
                                {{ \App\Models\Client::where('id', $this->record->client_id)->first()->name }}
                            </p>

                            <p class="text-lg tracking-tight font-body mt-1 text-right font-normal italic">
                                {{ \App\Models\Client::where('id', $this->record->client_id)->first()->email }}
                            </p>

                            <p class="text-lg tracking-tight font-body mt-1 text-right font-normal italic">
                                {{ \App\Models\Client::where('id', $this->record->client_id)->first()->phone }}
                            </p>

                            <p class="mt-2 text-right font-light">{{ $this->record->issue_date }}</p>
                        </div>
                    </div>
                    <div class="px-9">
                        <div class="flex w-full">
                            <div class="">
                                <div class="text-sm font-light text-slate-500 italic">
                                    <p class="text-sm font-normal text-slate-700 not-italic">Billed To</p>
                                    <p>The Boring Company</p>
                                    <p>Tesla Street 007</p>
                                    <p>Frisco</p>
                                    <p>CA 0000</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-9">
                        <div class="flex flex-col mx-0 mt-2">
                            <table class="min-w-full divide-y divide-slate-500">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                            Description
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

                                    @foreach ($this->record->items as $itemList)
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
                                            ${{ $this->record->total }}
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
                                            ${{ $this->record->total }}
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
</x-filament-panels::page>
