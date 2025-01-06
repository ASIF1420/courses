<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Form with Materials & Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .form-section {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <form method="POST" action="{{ route('materials.store') }}" id="Storematerial" enctype="multipart/form-data">
            @csrf
            <!-- Course Information Section -->
            <div class="form-section">
                <div class="section-title">Course Information</div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="course_title" class="form-label">Course Title</label>
                        <input type="text" class="form-control" id="course_title" name="course_title" required>
                    </div>
                    <div class="col-md-6">
                        <label for="course_status" class="form-label">Course Status</label>
                        <select class="form-select" id="course_status" name="course_status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="designation" class="form-label">Designation</label>
                        <select class="form-select" id="designation" name="designation">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="brand" class="form-label">Brand</label>
                        <select class="form-select" id="brand" name="brand">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="designation" class="form-label">Designation</label>
                        <select class="form-select" id="designation" name="designation">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="brand" class="form-label">Brand</label>
                        <select class="form-select" id="brand" name="brand">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Modules Section -->
            <div id="modulesSection"></div>
            <button type="button" id="addModule" class="btn btn-secondary mb-3">Add Module</button>

            <!-- Submit Section -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            let moduleCount = 0;

            // Add Module
            $('#addModule').click(function () {
                moduleCount++;
                const moduleHtml = `
                    <div class="form-section module-section" id="module_${moduleCount}">
                        <div class="section-title">Module ${moduleCount} 
                            <button type="button" class="btn btn-danger btn-sm remove-module" data-module-id="${moduleCount}">Remove Module</button>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="module_title_${moduleCount}" class="form-label">Module Title</label>
                                <input type="text" class="form-control" id="module_title_${moduleCount}" name="modules[${moduleCount}][title]" required>
                            </div>
                            <div class="col-md-6">
                                <label for="module_status_${moduleCount}" class="form-label">Module Status</label>
                                <select class="form-select" id="module_status_${moduleCount}" name="modules[${moduleCount}][status]" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="moduleTitle" class="form-label">Test Title</label>
                                <input type="text" class="form-control" id="moduleTitle" name="modules[${moduleCount}][title]">
                            </div>
                            <div class="col-md-6">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="duration" name="modules[${moduleCount}][duration]">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="interaction" class="form-label">Interaction</label>
                            <textarea class="form-control" id="interaction" name="modules[${moduleCount}][interaction]" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="module_description_${moduleCount}" class="form-label">Module Description</label>
                            <textarea class="form-control" id="module_description_${moduleCount}" name="modules[${moduleCount}][description]" rows="4" required></textarea>
                        </div>

                        <!-- Materials Section -->
                        <div class="materials-section">
                            <h5>Materials</h5>
                            <div id="materials_${moduleCount}"></div>
                            <button type="button" class="btn btn-secondary add-material" data-module-id="${moduleCount}">Add Material</button>
                        </div>

                        <!-- Questions Section -->
                        <div class="questions-section mt-4">
                            <h5>Questions</h5>
                            <div id="questions_${moduleCount}"></div>
                            <button type="button" class="btn btn-secondary add-question" data-module-id="${moduleCount}">Add Question</button>
                        </div>
                    </div>`;
                $('#modulesSection').append(moduleHtml);
            });

            // Remove Module
            $(document).on('click', '.remove-module', function () {
                const moduleId = $(this).data('module-id');
                $(`#module_${moduleId}`).remove();
            });

            // Add Material
            $(document).on('click', '.add-material', function () {
                const moduleId = $(this).data('module-id');
                const materialCount = $(`#materials_${moduleId} .material-row`).length + 1;

                const materialHtml = `
                    <div class="row mb-3 material-row">
                        <div class="col-md-5">
                            <label for="material_type_${moduleId}_${materialCount}" class="form-label">Material Type</label>
                            <select class="form-select material-type" id="material_type_${moduleId}_${materialCount}" name="modules[${moduleId}][materials][${materialCount}][type]" required>
                                <option value="file">File</option>
                                <option value="link">Link</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="material_input_${moduleId}_${materialCount}" class="form-label">Upload File / Link</label>
                            <input type="file" class="form-control material-input file-input" id="material_input_${moduleId}_${materialCount}" name="modules[${moduleId}][materials][${materialCount}][file]" required>
                            <input type="text" class="form-control material-input link-input d-none" id="material_link_${moduleId}_${materialCount}" name="modules[${moduleId}][materials][${materialCount}][link]" placeholder="Enter link" required>
                        </div>
                        <div class="col-md-2 text-end">
                            <button type="button" class="btn btn-danger remove-material">Remove</button>
                        </div>
                    </div>`
                $(`#materials_${moduleId}`).append(materialHtml);
            });

            // Remove Material
            $(document).on('click', '.remove-material', function () {
                $(this).closest('.material-row').remove();
            });

            // Add Question
            $(document).on('click', '.add-question', function () {
                const moduleId = $(this).data('module-id');
                const questionCount = $(`#questions_${moduleId} .question-row`).length + 1;

                const questionHtml = `
                    <div class="row mb-3 question-row">
                        <div class="col-md-8">
                            <label for="question_${moduleId}_${questionCount}" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question_${moduleId}_${questionCount}" name="modules[${moduleId}][questions][${questionCount}][text]" required>
                        </div>
                        <div class="col-md-2">
                            <label for="question_status_${moduleId}_${questionCount}" class="form-label">Status</label>
                            <select class="form-select" id="question_status_${moduleId}_${questionCount}" name="modules[${moduleId}][questions][${questionCount}][status]" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-2 text-end">
                            <button type="button" class="btn btn-danger remove-question">Remove</button>
                        </div>
                    </div>`;
                $(`#questions_${moduleId}`).append(questionHtml);
            });

            // Remove Question
            $(document).on('click', '.remove-question', function () {
                $(this).closest('.question-row').remove();
            });
        });

        $(document).on('change', '.material-type', function () {
            const $this = $(this);
            const materialType = $this.val(); // Get selected type (file/link)
            const $row = $this.closest('.material-row'); // Get the parent row

            // Handle file input visibility
            if (materialType === 'file') {
                $row.find('.file-input').removeClass('d-none').attr('required', true);
                $row.find('.link-input').addClass('d-none').removeAttr('required');
            }
            // Handle link input visibility
            else if (materialType === 'link') {
                $row.find('.link-input').removeClass('d-none').attr('required', true);
                $row.find('.file-input').addClass('d-none').removeAttr('required');
            }
        });
    </script>
</body>

</html>
