<main class="p-3" style="height: 500px;">
    <form action="<?= route_to('admin_show') ?>" method="post">
        <fieldset>
            <legend class="text-left">Rastreamento</legend>
            <div class="mb-3">
                <label for="codigo" class="form-label">Digite o Código de Rastreamento</label>
                <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Código Aqui">
            </div>
            <!-- <div class="mb-3">
                <label for="disabledSelect" class="form-label">Disabled select menu</label>
                <select id="disabledSelect" class="form-select">
                    <option>Disabled select</option>
                </select>
            </div> -->
            <!-- <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                    <label class="form-check-label" for="disabledFieldsetCheck">
                        Can't check this
                    </label>
                </div>
            </div> -->
            <button type="submit" class="btn btn-primary">Rastrear</button>
        </fieldset>
    </form>
</main>