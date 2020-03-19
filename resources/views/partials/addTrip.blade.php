<form method="POST" action="{{ route('tripStore') }}" class="form-signin">
@csrf


    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="sel1">Select Destination Country:</label>
                <select id="sel1" name="destination" class="form-control @error('destination') is-invalid @enderror">
                    <option></option>
                    <option>Israel</option>
                    <option>United States</option>
                    <option>United Kingdom</option>
                </select>
                @error('destination')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="seli">Select Departure Date:</label>
                <br />
                <input type="date" name="bday" class="form-control @error('destination') is-invalid @enderror" id="seli" />
                @error('bday')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label style="visibility:hidden" for="sel1">Select Departure Date:</label>
                <br />
                <button type="submit" class="btn btn-primary form-control">Add Trip</button>
            </div>
        </div>
    </div>
</form>