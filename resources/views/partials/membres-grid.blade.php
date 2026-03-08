@forelse($membres ?? [] as $index => $membre)
    <div class="membre-card relative group">
        <div class="relative bg-surface-dark border border-border-dark rounded-xl p-6 transition-all duration-300 hover:border-primary/50">
            
            <div class="flex flex-col items-center text-center">
                <!-- Avatar avec cercles pointillés -->
                <div class="relative mb-4">
                    <button type="button" class="open-modal-btn relative block" data-member-id="{{ $membre['id'] }}">
                        <img class="w-24 h-24 rounded-full object-cover border-4 {{ $membre['highest_role'] ? 'border-primary/20' : 'border-slate-700' }}"
                            src="{{ $membre['avatar'] }}"
                            alt="{{ $membre['display_name'] }}" />
                        
                        <!-- Cercles pointillés autour de l'avatar -->
                        <svg class="absolute -inset-3 w-[calc(100%+1.5rem)] h-[calc(100%+1.5rem)] -top-3 -left-3 pointer-events-none" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="46" fill="none" stroke="rgba(108, 43, 238, 0.3)" stroke-width="2" stroke-dasharray="6 6"/>
                            <circle cx="50" cy="50" r="52" fill="none" stroke="rgba(108, 43, 238, 0.15)" stroke-width="1.5" stroke-dasharray="4 8"/>
                        </svg>
                    </button>
                </div>
                
                <!-- Nom du membre -->
                <h3 class="text-lg font-bold text-white mb-2">
                    <button type="button" class="open-modal-btn hover:text-primary transition-colors" data-member-id="{{ $membre['id'] }}">
                        {{ $membre['display_name'] }}
                    </button>
                </h3>
                
                <!-- Rôle principal -->
               @if($membre['highest_role'])
    @php
        $roleName = $membre['highest_role']['name'];
        $roleColor = $membre['highest_role']['color_hex'] ?? '#6c2bee'; // Utilise color_hex
    @endphp
    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider mb-3"
          style="background-color: {{ $roleColor }}15; color: {{ $roleColor }}; border: 1px solid {{ $roleColor }}30;">
        {{ $roleName }}
    </span>
@else
    <span class="px-3 py-1 rounded-full bg-slate-700/50 text-slate-400 text-[10px] font-bold uppercase tracking-wider mb-3">
        Membre
    </span>
@endif

                <!-- Informations supplémentaires -->
                <div class="flex items-center justify-center gap-4 text-xs text-slate-400 w-full mt-2 pt-3 border-t border-border-dark/50">
                    <!-- Date d'arrivée -->
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-primary/60">calendar_month</span>
                        @php
                            $joinDate = \Carbon\Carbon::parse($membre['joined_at']);
                        @endphp
                        <span>{{ $joinDate->format('d/m/Y') }}</span>
                    </div>

                    <!-- Séparateur -->
                    <span class="w-px h-3 bg-border-dark"></span>

                    <!-- Nombre de rôles -->
                    <div class="flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-sm text-primary/60">military_tech</span>
                        <span>{{ $membre['roles_count'] ?? '1' }}</span>
                    </div>
                </div>
            </div>

            <!-- Bouton Voir le profil (œil) -->
            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <button type="button" 
                        class="open-modal-btn w-8 h-8 bg-primary/90 hover:bg-primary rounded-full flex items-center justify-center text-white shadow-lg"
                        data-member-id="{{ $membre['id'] }}">
                    <span class="material-symbols-outlined text-lg">visibility</span>
                </button>
            </div>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-12">
        <span class="material-symbols-outlined text-6xl text-slate-500 mb-4">sentiment_dissatisfied</span>
        <p class="text-slate-400">Aucun membre trouvé</p>
    </div>
@endforelse