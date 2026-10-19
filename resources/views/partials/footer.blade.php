<footer class="hidden bg-sand shadow-[0_-1px_8px_rgba(32,36,30,0.03)] lg:block">
    <div class="page py-16">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-[1.5fr_0.8fr_1fr_1fr]">
            <div class="max-w-sm">
                <p class="font-serif text-2xl font-semibold">Seraye Moments</p>
                <p class="mt-4 text-[15px] leading-relaxed text-ink-soft">
                    Boutique photography &amp; videography studio collective crafting tangible, timeless keepsakes for graduations, weddings, and personal milestones.
                </p>
                <p class="eyebrow mt-6 flex items-center gap-2 !text-xs text-ink-soft">
                    <span class="size-2 rounded-full bg-olive"></span>
                    Studio open: Sen — Sab, 09:00 – 18:00 WIB
                </p>
            </div>

            <div>
                <h2 class="eyebrow !text-xs !font-semibold text-ink">Explorations</h2>
                <ul class="mt-5 space-y-3 text-sm text-ink-soft">
                    <li><a class="hover:text-olive" href="{{ route('portfolio') }}">Graduation Gallery</a></li>
                    <li><a class="hover:text-olive" href="{{ route('portfolio') }}">Editorial Portraits</a></li>
                    <li><a class="hover:text-olive" href="{{ route('portfolio') }}">Intimate Nuptials</a></li>
                    <li><a class="hover:text-olive" href="{{ route('portfolio') }}">Archival Films</a></li>
                </ul>
            </div>

            <div>
                <h2 class="eyebrow !text-xs !font-semibold text-ink">The Studio</h2>
                <ul class="mt-5 space-y-3 text-sm text-ink-soft">
                    <li><a class="hover:text-olive" href="{{ route('services') }}">Curated Packages &amp; Investment</a></li>
                    <li><a class="hover:text-olive" href="{{ route('about') }}">Philosophy &amp; Ethos</a></li>
                    <li><a class="hover:text-olive" href="{{ route('booking') }}">Inquiry &amp; Reserve Date</a></li>
                    <li><a class="hover:text-olive" href="{{ route('portal') }}">Client Proofing Vault</a></li>
                </ul>
            </div>

            <div>
                <h2 class="eyebrow !text-xs !font-semibold text-ink">Studio Atelier</h2>
                <address class="mt-5 space-y-3 text-sm not-italic text-ink-soft">
                    <p>Jl. Kemang Timur No. 42B, Bangka, Mampang Prapatan, Jakarta Selatan 12730</p>
                    <p><a class="hover:text-olive" href="mailto:halo@serayemoments.com">halo@serayemoments.com</a></p>
                    <p>
                        <a class="eyebrow inline-flex items-center gap-2 !text-xs text-olive hover:underline" href="{{ route('booking') }}">
                            @include('partials.icon', ['name' => 'calendar', 'class' => 'size-4'])
                            Schedule a studio visit
                        </a>
                    </p>
                </address>
            </div>
        </div>

        <div class="mt-14 flex flex-col gap-4 pt-6 text-xs text-ink-soft sm:flex-row sm:items-center sm:justify-between">
            <p>
                <em class="font-serif text-olive">“Karna Setiap Momen Patut Dirayakan”</em>
                <span class="mx-1">—</span>
                &copy; 2025 Seraye Moments Studio. All rights reserved.
            </p>
            <ul class="flex flex-wrap gap-x-6 gap-y-2">
                <li><a class="hover:text-olive" href="#">Terms of Service</a></li>
                <li><a class="hover:text-olive" href="#">Privacy Policy</a></li>
                <li><a class="hover:text-olive" href="#">Archival Rights</a></li>
            </ul>
        </div>
    </div>
</footer>
