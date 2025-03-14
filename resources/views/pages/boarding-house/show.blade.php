@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[230px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
    </div>
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="{{ route('home') }}"
            class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px]" alt="icon">
        </a>
        <p class="font-semibold">Choose Available Room</p>
        <div class="dummy-btn w-12"></div>
    </div>
    <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
        <div class="flex w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
            <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover"
                    alt="icon">
            </div>
            <div class="flex flex-col gap-3 w-full">
                <h1 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                    {{ $boardingHouse->name }}
                </h1>
                <hr class="border-[#F1F2F6]">
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/location.svg') }}" class="w-5 h-5 flex shrink-0" alt="icon">
                    <p class="text-sm text-ngekos-grey">Kota {{ $boardingHouse->city->name }}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-5 h-5 flex shrink-0"
                        alt="icon">
                    <p class="text-sm text-ngekos-grey">In {{ $boardingHouse->category->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('booking', $boardingHouse->slug) }}" class="relative flex flex-col gap-4 mt-5">
        <input type="hidden" name="boarding_house_id" value="{{ $boardingHouse->id }}">
        <h2 class="font-bold px-5">Available Rooms</h2>
        <div id="RoomsContainer" class="flex flex-col gap-4 px-5">
            @foreach ($boardingHouse->rooms as $room)
                <label class="relative group">
                    <input type="radio" name="room_id" class="absolute top-1/2 left-1/2 -z-10 opacity-0"
                        value="{{ $room->id }}" required>
                    <div
                        class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] group-has-[:checked]:ring-2 group-has-[:checked]:ring-[#91BF77] transition-all duration-300">
                        <div class="flex w-[120px] h-[156px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                            <img src="{{ asset('storage/' . $room->images->first()->image) }}"
                                class="w-full h-full object-cover" alt="icon">
                        </div>
                        <div class="flex flex-col gap-3 w-full">
                            <h3 class="font-semibold text-lg leading-[27px]">{{ $room->name }}</h3>
                            <hr class="border-[#F1F2F6]">
                            <div class="flex items-center gap-[6px]">
                                <img src="{{ asset('assets/images/icons/profile-2user.svg') }}"
                                    class="w-5 h-5 flex shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey">{{ $room->capacity }} People</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="w-5 h-5 flex shrink-0"
                                    alt="icon">
                                <p class="text-sm text-ngekos-grey">{{ $room->square_feet }} sqft flat</p>
                            </div>
                            <hr class="border-[#F1F2F6]">
                            <p class="font-semibold text-lg text-ngekos-orange">Rp
                                {{ number_format($room->price_per_month, 0, ',', '.') }}<span
                                    class="text-sm text-ngekos-grey font-normal">/bulan</span></p>
                        </div>
                    </div>
                </label>
            @endforeach
        </div>
        <div id="BottomButton" class="relative flex w-full h-[98px] shrink-0">
            <div class="fixed bottom-[30px] w-full max-w-[640px] px-5 z-10">
                <button class="w-full rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white text-center">Continue
                    Booking</button>
            </div>
        </div>
    </form>
@endsection
(14:21:09) @extends('layouts.app')

@section('content')
    <div id="Content-Container"
        class="relative flex flex-col w-full max-w-[640px] min-h-screen mx-auto bg-white overflow-x-hidden">
        <div id="ForegroundFade"
            class="absolute top-0 w-full h-[143px] bg-[linear-gradient(180deg,#070707_0%,rgba(7,7,7,0)_100%)] z-10">
        </div>
        <div id="TopNavAbsolute" class="absolute top-[60px] flex items-center justify-between w-full px-5 z-10">
            <a href="{{ route('home') }}"
                class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white/10 backdrop-blur-sm">
                <img src="{{ asset('assets/images/icons/arrow-left-transparent.svg') }}" class="w-8 h-8" alt="icon">
            </a>
            <p class="font-semibold text-white">Details</p>
            <button
                class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white/10 backdrop-blur-sm">
                <img src="{{ asset('assets/images/icons/like.svg') }}" class="w-[26px] h-[26px]" alt="">
            </button>
        </div>
        <div id="Gallery" class="swiper-gallery w-full overflow-x-hidden -mb-[38px]">
            <div class="swiper-wrapper">
                @foreach ($boardingHouse->rooms as $room)
                    @foreach ($room->images as $image)
                        <div class="swiper-slide !w-fit">
                            <div class="flex shrink-0 w-[320px] h-[430px] overflow-hidden">
                                <img src="{{ asset('storage/' . $image->image) }}" class="w-full h-full object-cover"
                                    alt="gallery thumbnails">
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        <main id="Details" class="relative flex flex-col rounded-t-[40px] py-5 pb-[10px] gap-4 bg-white z-10">
            <div id="Title" class="flex items-center justify-between gap-2 px-5">
                <h1 class="font-bold text-[22px] leading-[33px]">{{ $boardingHouse->name }}</h1>
                <div
                    class="flex flex-col items-center text-center shrink-0 rounded-[22px] border border-[#F1F2F6] p-[10px_20px] gap-2 bg-white">
                    <img src="{{ asset('assets/images/icons/star.svg') }}" class="w-6 h-6" alt="icon">
                    <p class="font-bold text-sm">4/5</p>
                </div>
            </div>
            <hr class="border-[#F1F2F6] mx-5">
            <div id="Features" class="grid grid-cols-2 gap-x-[10px] gap-y-4 px-5">
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/location.svg') }}" class="w-[26px] h-[26px] flex shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Kota {{ $boardingHouse->city->name }}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="w-[26px] h-[26px] flex shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">In {{ $boardingHouse->category->name }}</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="w-[26px] h-[26px] flex shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">4 People</p>
                </div>
                <div class="flex items-center gap-[6px]">
                    <img src="{{ asset('assets/images/icons/shield-tick.svg') }}" class="w-[26px] h-[26px] flex shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Privacy 100%</p>
                </div>
            </div>
            <hr class="border-[#F1F2F6] mx-5">
            <div id="About" class="flex flex-col gap-[6px] px-5">
                <h2 class="font-bold">About</h2>
                <p class="leading-[30px]">
                    {!! $boardingHouse->description !!}
                </p>
            </div>
            <div id="Tabs" class="swiper-tab w-full overflow-x-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide !w-fit">
                        <button
                            class="tab-link rounded-full p-[8px_14px] border border-[#F1F2F6] text-sm font-semibold hover:bg-ngekos-black hover:text-white transition-all duration-300 !bg-ngekos-black !text-white"
                            data-target-tab="#Bonus-Tab">Bonus Kos</button>
                    </div>
                    <div class="swiper-slide !w-fit">
                        <button
                            class="tab-link rounded-full p-[8px_14px] border border-[#F1F2F6] text-sm font-semibold hover:bg-ngekos-black hover:text-white transition-all duration-300"
                            data-target-tab="#Testimonials-Tab">Testimonials</button>
                    </div>
                    <div class="swiper-slide !w-fit">
                        <button
                            class="tab-link rounded-full p-[8px_14px] border border-[#F1F2F6] text-sm font-semibold hover:bg-ngekos-black hover:text-white transition-all duration-300"
                            data-target-tab="#Rules-Tab">Rules</button>
                    </div>
                    <div class="swiper-slide !w-fit">
                        <button
                            class="tab-link rounded-full p-[8px_14px] border border-[#F1F2F6] text-sm font-semibold hover:bg-ngekos-black hover:text-white transition-all duration-300"
                            data-target-tab="#Contact-Tab">Contact</button>
                    </div>
                    <div class="swiper-slide !w-fit">
                        <button
                            class="tab-link rounded-full p-[8px_14px] border border-[#F1F2F6] text-sm font-semibold hover:bg-ngekos-black hover:text-white transition-all duration-300"
                            data-target-tab="#Rewards-Tab">Rewards</button>
                    </div>
                </div>
            </div>
            <div id="TabsContent" class="px-5">
                <div id="Bonus-Tab" class="tab-content flex flex-col gap-5">
                    <div class="flex flex-col gap-4">

                        @foreach ($boardingHouse->bonuses as $bonus)
                            <div
                                class="bonus-card flex items-center rounded-[22px] border border-[#F1F2F6] p-[10px] gap-3 hover:border-[#91BF77] transition-all duration-300">
                                <div class="flex w-[120px] h-[90px] shrink-0 rounded-[18px] bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ asset('storage/' . $bonus->image) }}" class="w-full h-full object-cover"
                                        alt="thumbnails">
                                </div>
                                <div>
                                    <p class="font-semibold">{{ $bonus->name }}</p>
                                    <p class="text-sm text-ngekos-grey">{{ $bonus->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="Testimonials-Tab" class="tab-content flex-col gap-5 hidden">
                    <div class="flex flex-col gap-4">
                        @foreach ($boardingHouse->testimonials as $testimonial)
                            <div
                                class="testi-card flex flex-col rounded-[22px] border border-[#F1F2F6] p-4 gap-3 bg-white hover:border-[#91BF77] transition-all duration-300">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-[70px] h-[70px] flex shrink-0 rounded-full border-4 border-white ring-1 ring-[#F1F2F6] overflow-hidden">
                                        <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                            class="w-full h-full object-cover" alt="icon">
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $testimonial->name }}</p>
                                        <p class="mt-[2px] text-sm text-ngekos-grey">{{ $testimonial->created_at }}</p>
                                    </div>
                                </div>
                                <p class="leading-[26px]">
                                    {{ $testimonial->content }}
                                </p>
                                <div class="flex">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <img src="{{ asset('assets/images/icons/Star 1.svg') }}"
                                            class="w-[22px] h-[22px] flex shrink-0" alt="">
                                    @endfor
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="Rules-Tab" class="tab-content flex-col gap-5 hidden">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Porro, vitae.</div>
                <div id="Contact-Tab" class="tab-content flex-col gap-5 hidden">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Porro, vitae.</div>
                <div id="Rewards-Tab" class="tab-content flex-col gap-5 hidden">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Porro, vitae.</div>
            </div>
        </main>
        <div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
            <div class="fixed bottom-5 w-full max-w-[640px] px-5 z-10">
                <div class="flex items-center justify-between rounded-[40px] py-4 px-6 bg-ngekos-black">
                    <p class="font-bold text-xl leading-[30px] text-white">
                        Rp {{ number_format($boardingHouse->price, 0, ',', '.') }}
                        <br>
                        <span class="text-sm font-normal">/bulan</span>
                    </p>
                    <a href="{{ route('kos.rooms', $boardingHouse->slug) }}"
                        class="flex shrink-0 rounded-full py-[14px] px-5 bg-ngekos-orange font-bold text-white">Book
                        Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/details.js') }}"></script>
@endsection