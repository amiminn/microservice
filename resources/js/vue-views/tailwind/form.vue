<template lang="">
    <div>
        <div class="card">
            <div class="card-body">
                <div class="mb-4 font-semibold text-2xl text-sky-900">
                    Form input
                    <hr />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <div>
                            <div class="label">Your email</div>
                            <input
                                type="text"
                                value="form input"
                                class="form-input"
                            />
                        </div>
                    </div>
                    <div>.form-input</div>
                    <div>
                        <div>
                            <div class="label">username</div>
                            <input
                                type="text"
                                disabled
                                value="disabled value"
                                class="form-input"
                            />
                        </div>
                    </div>
                    <div>.form-input disabled</div>
                    <div>
                        <div class="label">Your Email</div>
                        <div class="relative">
                            <div class="header-icon">
                                <vue-feather type="mail"></vue-feather>
                            </div>
                            <input
                                type="text"
                                class="form-icon"
                                placeholder="form icon"
                            />
                        </div>
                    </div>
                    <div>.header-icon .form-icon</div>
                    <div>
                        <div class="label">upload image</div>
                        <input type="file" class="form-file" />
                    </div>
                    <div>.form-file</div>
                    <div>
                        <div class="label">choose country</div>
                        <select class="form-input">
                            <option selected>Choose a country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>
                        </select>
                    </div>
                    <div>.form-input</div>
                    <div>
                        <div class="relative">
                            <input
                                type="text"
                                class="material-input peer"
                                placeholder=" "
                            />
                            <div class="material-label">material</div>
                        </div>
                    </div>
                    <div>.material-input .material-label</div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
