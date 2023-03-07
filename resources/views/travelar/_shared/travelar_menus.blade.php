<h3 class="profile pb-5">Setting</h3>
<div class="profileside_mu">
    <div class="pr_img">
        <img class="pr_img" src="{{ Auth::user() }}" alt="">
        <span>{{Auth::user()->name}}</span>
    </div>
    <div class="pr_details">
        <ul class="pr_all p-0">
            <a href="">
                <li><i class="bi bi-person-fill"></i><span>Profile</span></li>
            </a>
            <a href="{{ route("travelar-profile-address") }}" class="pt-0">
                <li><i class="bi bi-house-fill"></i><span>Address</span></li>
            </a>
            <a href="{{ route("travelar-cards") }}" class="pt-0">
                <li><i class="bi bi-credit-card"></i><span>Credit Card</span></li>
            </a>
            <a href="{{ route("travelar-request") }}" class="pt-0">
                <li><i class="bi bi-paypal"></i><span>Requests</span></li>
            </a>
            <a href="{{ route("travelar-change-password") }}" class="pt-0">
                <li><i class="bi bi-lock-fill"></i><span>Change Password</span></li>
            </a>
            <!-- <a href="" class="pt-0">
                <li><i class="bi bi-trash3-fill"></i><span>Delete Account</span></li>
            </a> -->
        </ul>
    </div>
</div>