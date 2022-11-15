<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <ul>
                    <li>Admin</li>
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="hero is-hero-bar">
    <div class="hero-body">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <h1 class="title">
                        Dashboard
                    </h1>
                </div>
            </div>
            <div class="level-right" style="display: none;">
                <div class="level-item"></div>
            </div>
        </div>
    </div>
</section>
<section class="section is-main-section">
    <div class="container is-fluid">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth" id="example">
            <thead>
                <tr>
                    <th class="is-checkbox-cell">
                        <label class="b-checkbox checkbox">
                            <input type="checkbox" value="false">
                            <span class="check"></span>
                        </label>
                    </th>
                    <th></th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Progress</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="is-checkbox-cell">
                        <label class="b-checkbox checkbox">
                            <input type="checkbox" value="false">
                            <span class="check"></span>
                        </label>
                    </td>
                    <td class="is-image-cell">
                        <div class="image">
                            <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="is-rounded">
                        </div>
                    </td>
                    <td data-label="Name">Rebecca Bauch</td>
                    <td data-label="Company">Daugherty-Daniel</td>
                    <td data-label="City">South Cory</td>
                    <td data-label="Progress" class="is-progress-cell">
                        <progress max="100" class="progress is-small is-primary" value="79">79</progress>
                    </td>
                    <td data-label="Created">
                        <small class="has-text-grey is-abbr-like" title="Oct 25, 2020">Oct 25, 2020</small>
                    </td>
                    <td class="is-actions-cell">
                        <div class="buttons is-right">
                            <button class="button is-small is-primary" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </button>
                            <button class="button is-small is-danger jb-modal" data-target="sample-modal" type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<script src="<?= BASE_URL ?>/js/dashboard/dashboard.js"></script>