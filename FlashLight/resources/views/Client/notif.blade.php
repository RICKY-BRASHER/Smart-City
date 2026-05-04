@extends('Client.users')
@section('title','SC-Notifications')
@section('content')
<div id="notificationsSection" class="page-section active">
    <div
        class="page-header d-flex align-items-start align-items-md-center flex-column flex-md-row gap-3 anim-1">
        <div>
            <h1>Notifications</h1>
            <p>Restez informé de l'avancement de vos signalements.</p>
        </div>
        <button class="btn-add ms-auto"
            onclick="showToast('success','Toutes les notifications marquées comme lues !')"><i
                class="bi bi-check2-all"></i> Tout marquer lu</button>
    </div>
    <div class="cf-card anim-2">
        <div class="cf-card-header">
            <div class="card-icon-header"><i class="bi bi-bell-fill"></i></div>
            <h5>Toutes les notifications</h5>
            <span
                style="margin-left:auto;background:var(--blue);color:#fff;font-size:.65rem;font-weight:700;border-radius:99px;padding:.15rem .55rem">5
                non lues</span>
        </div>
        <div class="notif-item unread" onclick="showToast('info','Notification : Signalement résolu')">
            <div class="notif-dot" style="background:var(--green-light);color:var(--green)"><i
                    class="bi bi-check-circle-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Votre signalement <strong>#CF-1268</strong> a été
                    <strong>résolu</strong> par l'Agent Kouam Pierre.
                </div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                    45
                    min</div>
            </div>
            <div class="unread-dot"></div>
        </div>
        <div class="notif-item unread" onclick="showToast('info','Notification : Signalement assigné')">
            <div class="notif-dot" style="background:var(--orange-light);color:var(--orange)"><i
                    class="bi bi-person-check-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Votre signalement <strong>#CF-1275</strong> a été assigné à
                    <strong>Agent Kouam Pierre</strong>.
                </div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                    1h
                </div>
            </div>
            <div class="unread-dot"></div>
        </div>
        <div class="notif-item unread" onclick="showToast('info','Notification : Nouveau commentaire')">
            <div class="notif-dot" style="background:#f3e8ff;color:#7c3aed"><i
                    class="bi bi-chat-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Un commentaire a été ajouté sur votre signalement
                    <strong>#CF-1279</strong>.
                </div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a
                    2h
                </div>
            </div>
            <div class="unread-dot"></div>
        </div>
        <div class="notif-item unread"
            onclick="showToast('info','Notification : Signalement enregistré')">
            <div class="notif-dot" style="background:#e0f2fe;color:#0369a1"><i
                    class="bi bi-flag-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Votre signalement <strong>#CF-1284</strong> a bien été
                    enregistré.</div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Il y a 4
                    min</div>
            </div>
            <div class="unread-dot"></div>
        </div>
        <div class="notif-item unread" onclick="showToast('error','Notification : Signalement rejeté')">
            <div class="notif-dot" style="background:var(--red-light);color:var(--red)"><i
                    class="bi bi-x-circle-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Votre signalement <strong>#CF-1240</strong> a été
                    <strong>rejeté</strong>. Raison : doublon.
                </div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> Hier,
                    10h22
                </div>
            </div>
            <div class="unread-dot"></div>
        </div>
        <div class="notif-item">
            <div class="notif-dot" style="background:var(--green-light);color:var(--green)"><i
                    class="bi bi-check-circle-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Votre signalement <strong>#CF-1251</strong> a été résolu.</div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> 13 Avr.,
                    09h00</div>
            </div>
        </div>
        <div class="notif-item">
            <div class="notif-dot" style="background:var(--blue-light);color:var(--blue)"><i
                    class="bi bi-star-fill"></i></div>
            <div style="flex:1">
                <div class="notif-text">Vous avez gagné <strong>+5 points citoyen</strong> pour votre
                    contribution.</div>
                <div class="notif-time"><i class="bi bi-clock" style="font-size:.65rem"></i> 12 Avr.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection