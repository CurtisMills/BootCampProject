<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">{{ $user->info->bio }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <p class="card-text">
                Gender: {{ $user->info->gender }}
            </p>
            <p class="card-text">
                Occupation: {{ $user->info->occupation }}
            </p>
            <p class="card-text">
                Relationship Status:
                {{ $user->info->relationship_status }}
            </p>
            <p class="card-text">Age: {{ $user->info->age }}</p>
            <p class="card-text">
                Country of Birth:
                {{ $user->info->country_of_birth }}
            </p>
        </li>
        <li class="list-group-item">
            <p class="card-text">
                Minimum Rental Price (PCM): {{ $user->preference->min_price }}
            </p>
            <p class="card-text">
                Maximum Rental Price (PCM): {{ $user->preference->max_price }}
            </p>
            <p class="card-text">
                Minimum Housemate Age: {{ $user->preference->min_age }}
            </p>
            <p class="card-text">
                Maximum Housemate Age: {{ $user->preference->max_age }}
            </p>
            <p class="card-text">
                Minds pets: {{ $user->preference->pets_ok }}
            </p>
            <p class="card-text">
                Minds smokers: {{ $user->preference->smokers_ok }}
            </p>
            <p class="card-text">
                Gender Preference: {{ $user->preference->preferred_gender }}
            </p>
            <p class="card-text">
                Looking for Housemates in: {{ $user->preference->location }}
            </p>
            
        </li>
    </ul>
    <div class="card-body">

        <form
            action="{{ route('like', $user->id) }}"
            method="POST"
        >
            @csrf
            <button type="submit" class="btn btn-success">Like</button>
        </form>
        <form
            action="{{ route('dislike', $user->id) }}"
            method="POST"
        >
            @csrf
            <button type="submit" class="btn btn-danger">Dislike</button>
        </form>
    </div>
</div>