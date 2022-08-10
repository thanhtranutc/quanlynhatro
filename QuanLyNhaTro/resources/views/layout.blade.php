<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <div>
        <form>
            <form>
                <div id="drop-down" name="drop-down">
                    <label for="travel">Have you visited Europe before? </label>
                    <select name="travel" id="travel" onChange=showHide()>
                        <option value="1">Yes</option>
                        <option value="0" selected>No</option>
                    </select>
                </div>
                <div name="hidden-panel" id="hidden-panel">
                    <label for="country">Name of the country you visited: </label>
                    <input type="text" name="country" id="country" />
                </div>
            </form>
        </form>
    </div>
</body>
<script>
    function showHide() {
        let travelhistory = document.getElementById('travel')
        if (travelhistory.value == 1) {
            document.getElementById('hidden-panel').style.display = 'block'
        } else {
            document.getElementById('hidden-panel').style.display = 'none'
        }
    }   
</script>

</html>