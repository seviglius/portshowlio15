        //Masonry Layout
        // var $container = $('#StudentList');
        // $(function(){
        //  $container.imagesLoaded( function() {
        //      $container.masonry({
        //          itemSelector: '.scca-student',
        //          columnWidth: '.scca-student',
        //          isAnimated: true
        //      });
        //  });
        // });
        // Filter Functionality
        var $ =jQuery.noConflict();
        $(function(){
            // Cache jquery selectors we'll use later
            var $filters = $('#Filters input[type="checkbox"]'),
                $students = $('.scca-student');

            // Set up the click handler
            $filters.on('click', function() {
                var tags = [];
                var i;
                var $activeFilters = $filters.filter(':checked');

                // Build an array of active filters
                for (i = 0; i < $activeFilters.length; i++) {
                    tags.push($($activeFilters[i]).val());
                }

                // Call the filterStudents function
                filterStudents(tags);
            });

            function filterStudents(tags) {
                var i;
                //If there are no tags, show all the students
                if (tags.length <= 0) {
                    $students.show();
                    return;
                }
                // Show or hide students based on what checkboxes are checked
                for (i = 0; i < $students.length; i++) {
                    // Store EACH of student's skills they have attached to them in an array
                    var studentSkills = $($students[i]).data('skills').split(' ');
                    // Do the student's skills match the selected tags?
                    var matchSkills = skillMatch(studentSkills);
                    if(matchSkills) {
                        $($students[i]).show('fast');
                    } else {
                        $($students[i]).hide('slow');
                    }
                }
                function skillMatch(studentSkills) {
                // If the student's skills match the selected tags show them
                return tags.every(function(el){
                        if (studentSkills.indexOf(el) === -1) {
                            return false;
                        } else {
                            // If the student's skills don't match the selected tags hide them
                            return true;
                        }
                    });
                }
            }
        });
