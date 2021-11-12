<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $preference->user->name }}</h5>
        <p class="card-text">{{ $preference->user->info->bio }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <p class="card-text">
                Gender: {{ $preference->user->info->gender }}
            </p>
            <p class="card-text">
                Occupation: {{ $preference->user->info->occupation }}
            </p>
            <p class="card-text">
                Relationship Status:
                {{ $preference->user->info->relationship_status }}
            </p>
            <p class="card-text">Age: {{ $preference->user->info->age }}</p>
            <p class="card-text">
                Country of Birth:
                {{ $preference->user->info->country_of_birth }}
            </p>
        </li>
        <li class="list-group-item">
            <p class="card-text">
                Minimum Rental Price (PCM): {{ $preference->min_price }}
            </p>
            <p class="card-text">
                Maximum Rental Price (PCM): {{ $preference->max_price }}
            </p>
            <p class="card-text">
                Minimum Housemate Age: {{ $preference->min_age }}
            </p>
            <p class="card-text">
                Maximum Housemate Age: {{ $preference->max_age }}
            </p>
            <p class="card-text">
                Minds pets: {{ $preference->pets_ok }}
            </p>
            <p class="card-text">
                Minds smokers: {{ $preference->smokers_ok }}
            </p>
            <p class="card-text">
                Gender Preference: {{ $preference->preferred_gender }}
            </p>
            <p class="card-text">
                Looking for Housemates in: {{ $preference->location }}
            </p>
            
        </li>
    </ul>
    <div class="card-body">

        <form
            action="{{ route('like', $preference->user_id) }}"
            method="POST"
        >
            @csrf
            <button type="submit" class="btn btn-success">Like</button>
        </form>
        <form
            action="{{ route('dislike', $preference->user_id) }}"
            method="POST"
        >
            @csrf
            <button type="submit" class="btn btn-danger">Dislike</button>
        </form>
    </div>
</div>