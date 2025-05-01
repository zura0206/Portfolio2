<!-- Education Modal -->
<div id="educationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4 z-50">
    <div class="bg-white rounded-xl p-6 w-full max-w-md">
        <h3 id="educationModalTitle" class="text-xl font-semibold text-gray-800 mb-4">Add
            Education</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Degree/Course</label>
                <input id="eduCourse" type="text"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="e.g., B.S. in Computer Science">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Institution</label>
                <input id="eduInstitution" type="text"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="e.g., University of Technology">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Duration</label>
                <input id="eduDuration" type="text"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="e.g., 2019 - 2023">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="eduDescription"
                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                    placeholder="e.g., Specialized in Web Development..." rows="3"></textarea>
            </div>
        </div>
        <div class="flex justify-end space-x-3 mt-6">
            <button id="cancelEducationBtn"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
            <button id="saveEducationBtn"
                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">Save</button>
        </div>
    </div>
</div>
<!-- Certification Modal -->
<div id="certificationModal"
    class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h2 id="modalTitle" class="text-2xl font-bold mb-4">Add Certification</h2>
        <form id="certificationForm" method="POST">
            @csrf
            <input type="hidden" id="certificationId" name="certification_id">
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <div class="mb-4">
                <label for="cert_title" class="block text-sm font-medium text-gray-700">Certification Title</label>
                <input type="text" id="cert_title" name="cert_title"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="cert_issuer" class="block text-sm font-medium text-gray-700">Issuer</label>
                <input type="text" id="cert_issuer" name="cert_issuer"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="cert_year" class="block text-sm font-medium text-gray-700">Year</label>
                <input type="number" id="cert_year" name="cert_year"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                    required min="1900" max="{{ date('Y') }}">
            </div>
            <div class="mb-4">
                <label for="cert_description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="cert_description" name="cert_description"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" id="closeModalBtn"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Cancel</button>
                <button type="submit" id="submitCertificationBtn"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
    /**
     * Education Manager
     * Handles all education-related modals and operations
     */
    class EducationManager {
        constructor() {
            // DOM Elements
            this.dom = {
                modal: document.getElementById('educationModal'),
                addBtn: document.getElementById('addEducationBtn'),
                saveBtn: document.getElementById('saveEducationBtn'),
                cancelBtn: document.getElementById('cancelEducationBtn'),
                formFields: {
                    course: document.getElementById('eduCourse'),
                    institution: document.getElementById('eduInstitution'),
                    duration: document.getElementById('eduDuration'),
                    description: document.getElementById('eduDescription')
                }
            };

            // State
            this.state = {
                educations: {!! $educations->toJson() !!}
            };

            // Initialize
            this.initEventListeners();
        }

        /**
         * Initialize event listeners
         */
        initEventListeners() {
            // Modal buttons
            this.dom.addBtn.addEventListener('click', () => this.openModal());
            this.dom.cancelBtn.addEventListener('click', () => this.closeModal());
            this.dom.saveBtn.addEventListener('click', () => this.saveEducation());

            // Delegated event listeners for edit/delete
            document.addEventListener('click', (e) => this.handleDocumentClick(e));
        }

        /**
         * Handle document click events
         * @param {Event} e - Click event
         */
        handleDocumentClick(e) {
            // Edit Education
            if (e.target.closest('.edit-education-btn')) {
                const id = e.target.closest('.edit-education-btn').dataset.id;
                const education = this.state.educations.find(edu => edu.id == id);
                if (education) this.openModal(education);
            }

            // Delete Education
            if (e.target.closest('.delete-education-btn')) {
                this.deleteEducation(e.target.closest('.delete-education-btn').dataset.id);
            }
        }

        /**
         * Open modal in add or edit mode
         * @param {Object|null} education - Education data or null for add mode
         */
        openModal(education = null) {
            const title = document.getElementById('educationModalTitle');

            if (education) {
                title.textContent = 'Edit Education';
                this.dom.formFields.course.value = education.course;
                this.dom.formFields.institution.value = education.school_name;
                this.dom.formFields.duration.value = education.duration;
                this.dom.formFields.description.value = education.description;
                this.dom.modal.dataset.id = education.id;
            } else {
                title.textContent = 'Add Education';
                this.resetFormFields();
                delete this.dom.modal.dataset.id;
            }

            this.dom.modal.classList.remove('hidden');
        }

        /**
         * Close the modal
         */
        closeModal() {
            this.dom.modal.classList.add('hidden');
        }

        /**
         * Reset all form fields
         */
        resetFormFields() {
            Object.values(this.dom.formFields).forEach(field => {
                field.value = '';
            });
        }

        /**
         * Save education data
         */
        async saveEducation() {
            const btn = this.dom.saveBtn;
            const originalText = btn.textContent;

            try {
                // Disable button during save
                btn.disabled = true;
                btn.textContent = 'Saving...';

                const id = this.dom.modal.dataset.id;
                const data = {
                    course: this.dom.formFields.course.value,
                    school_name: this.dom.formFields.institution.value,
                    duration: this.dom.formFields.duration.value,
                    description: this.dom.formFields.description.value
                };

                const url = id ? `/EC/${id}` : '/education';
                const method = id ? 'PUT' : 'POST';

                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (result.success) {
                    window.location.reload();
                } else {
                    alert('Error saving education: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error saving education:', error);
                alert('An error occurred while saving');
            } finally {
                btn.disabled = false;
                btn.textContent = originalText;
            }
        }

        /**
         * Delete education entry
         * @param {string} id - Education ID to delete
         */
        async deleteEducation(id) {
            if (!confirm('Are you sure you want to delete this education entry?')) return;

            try {
                const response = await fetch(`/education/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });

                const result = await response.json();

                if (result.success) {
                    window.location.reload();
                } else {
                    alert('Error deleting education: ' + (result.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error deleting education:', error);
                alert('An error occurred while deleting');
            }
        }
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        new EducationManager();
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const certificationModal = document.getElementById('certificationModal');
        const certificationForm = document.getElementById('certificationForm');
        const modalTitle = document.getElementById('modalTitle');
        const submitCertificationBtn = document.getElementById('submitCertificationBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const addCertificationBtn = document.getElementById('addCertificationBtn');
        const certificationsContainer = document.getElementById('certificationsContainer');

        // Open modal for adding new certification
        addCertificationBtn.addEventListener('click', function() {
            certificationForm.reset();
            document.getElementById('certificationId').value = '';
            document.getElementById('formMethod').value = 'POST';
            certificationForm.action = "{{ route('certifications.store') }}";
            modalTitle.textContent = 'Add Certification';
            submitCertificationBtn.textContent = 'Save';
            certificationModal.classList.remove('hidden');
        });

        // Close modal
        closeModalBtn.addEventListener('click', function() {
            certificationModal.classList.add('hidden');
        });

        // Handle form submission
        certificationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(certificationForm);
            const certificationId = document.getElementById('certificationId').value;
            const method = certificationId ? 'PUT' : 'POST';
            const url = certificationId ?
                `/certifications/${certificationId}` :
                `/certifications`;

            // Debug: Log form data
            console.log('Submitting form with data:');
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }

            fetch(url, {
                    method: 'POST', // Always use POST, rely on _method for PUT
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    alert(data.message);
                    certificationModal.classList.add('hidden');
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (error.errors) {
                        alert('Validation failed: ' + JSON.stringify(error.errors));
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                });
        });

        // Handle edit button clicks
        document.querySelectorAll('.edit-certification-btn').forEach(button => {
            button.addEventListener('click', function() {
                const certificationId = this.dataset.id;
                console.log('Fetching certification with ID:', certificationId); // Debug
                fetch(`/certifications/${certificationId}`, {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Fetched certification data:',
                        data); // Debug: Log fetched data
                        // Ensure data has the expected fields
                        if (!data || !data.id) {
                            throw new Error('Invalid certification data received');
                        }
                        document.getElementById('certificationId').value = data.id;
                        document.getElementById('cert_title').value = data.cert_title || '';
                        document.getElementById('cert_issuer').value = data.cert_issuer ||
                            '';
                        document.getElementById('cert_year').value = data.cert_year || '';
                        document.getElementById('cert_description').value = data
                            .cert_description || '';
                        document.getElementById('formMethod').value = 'PUT';
                        certificationForm.action = `/certifications/${data.id}`;
                        modalTitle.textContent = 'Edit Certification';
                        submitCertificationBtn.textContent = 'Update';
                        certificationModal.classList.remove('hidden');
                        // Debug: Alert form values after population
                        console.log('Form fields after population:', {
                            cert_title: document.getElementById('cert_title').value,
                            cert_issuer: document.getElementById('cert_issuer')
                                .value,
                            cert_year: document.getElementById('cert_year').value,
                            cert_description: document.getElementById(
                                'cert_description').value,
                        });
                        // alert(
                        //     `Form values:\nTitle: ${document.getElementById('cert_title').value}\nIssuer: ${document.getElementById('cert_issuer').value}\nYear: ${document.getElementById('cert_year').value}`);
                    })
                    .catch(error => {
                        console.error('Error fetching certification:', error);
                        alert('Failed to load certification data: ' + error.message);
                    });
            });
        });
    });
</script>
</body>

</html>
