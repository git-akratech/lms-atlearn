<?php

class __Mustache_acc37f22c53c5768563d59900763518f extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        if ($partial = $this->mustache->loadPartial('theme_alpha/head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body ';
        $value = $this->resolveValue($context->find('bodyattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '>
';
        if ($partial = $this->mustache->loadPartial('core/local/toast/wrapper')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div id="page-wrapper" class="wrapper-fw d-print-block ';
        $value = $context->findDot('output.courseheadermenu');
        $buffer .= $this->section074790dc1144afd4e123c57768aa2ba7($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->findDot('output.courseheadermenu');
        if (empty($value)) {
            
            $buffer .= 'rui--course-witout-nav';
        }
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_top_of_body_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('hiddensidebar');
        if (empty($value)) {
            
            if ($partial = $this->mustache->loadPartial('theme_alpha/nav-drawer')) {
                $buffer .= $partial->renderInternal($context, $indent . '            ');
            }
        }
        $buffer .= $indent . '        ';
        $value = $context->find('hidecourseindexnav');
        if (empty($value)) {
            
            if ($partial = $this->mustache->loadPartial('theme_alpha/courseindex-tmpl')) {
                $buffer .= $partial->renderInternal($context);
            }
        }
        $buffer .= '
';
        $buffer .= $indent . '                
';
        $buffer .= $indent . '        <div id="page" data-region="mainpage" data-usertour="scroller" class="container-fluid drawers ';
        $value = $context->find('blockdraweropen');
        $buffer .= $this->section2f9abbbc7cfc8a578df65e02c2f006ff($context, $indent, $value);
        $buffer .= ' drag-container">
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_alpha/navbar')) {
            $buffer .= $partial->renderInternal($context, $indent . '            ');
        }
        $buffer .= $indent . '            ';
        $value = $this->resolveValue($context->findDot('output.breadcrumbs'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div id="topofscroll" class="main-inner">
';
        $buffer .= $indent . '                <div id="page-content" class="page-content wrapper-page">
';
        $buffer .= $indent . '                    <div id="region-main-box" class="region-main-wrapper">
';
        $buffer .= $indent . '                        <section id="region-main" class="';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->section79beb5cfa7b89bb67e7da9a67f96d7d7($context, $indent, $value);
        $buffer .= '" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->section6b403a6a78537640b9e04a931aeb6463($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '                            <div ';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->sectionD8905ccc04d728da18e2b7776a7a7837($context, $indent, $value);
        $buffer .= '>
';
        $buffer .= $indent . '                                <div class="wrapper-course ';
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->section8ce6577f7e0e34d379fdcf89cda2c95e($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $value = $context->find('secondarymoremenu');
        $buffer .= $this->section3cf9bed31f63cb67dd484b57a3ee6100($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->find('coursepageinformationbanners'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.full_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('hascstopbl');
        $buffer .= $this->section7f819f22d98df6f948b304f54af8ecd5($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('hasctopbl');
        $buffer .= $this->sectionBcac8de8b25b89a0e21e9ff8baa99282($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('courseimagecontent');
        $buffer .= $this->sectionB89fc4e7badf765ef95ad445a170d38d($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('hasregionmainsettingsmenu');
        $buffer .= $this->section47d38be224579d1e8081a7bd18f7754f($context, $indent, $value);
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.course_content_header'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.main_content'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.activity_navigation'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '                                    ';
        $value = $this->resolveValue($context->findDot('output.course_content_footer'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('hascsbottombl');
        $buffer .= $this->sectionFa2eee46a05f032186f00593f6ccf8ae($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '                                </div>
';
        if ($partial = $this->mustache->loadPartial('theme_alpha/hasblocks-tmpl')) {
            $buffer .= $partial->renderInternal($context, $indent . '                                ');
        }
        $value = $context->find('hassidecourseblocks');
        $buffer .= $this->sectionB29cb3bc5750652c6cfbca989c93d05b($context, $indent, $value);
        $buffer .= $indent . '                                
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </section>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('theme_alpha/footer')) {
            $buffer .= $partial->renderInternal($context, $indent . '                ');
        }
        $buffer .= $indent . '                
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.standard_after_main_region_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <script>
';
        $buffer .= $indent . '        // Get all elements with class "rui-modprogress"
';
        $buffer .= $indent . '        var progressDivs = document.querySelectorAll(\'.rui-modprogress\');
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        // Iterate over each div element
';
        $buffer .= $indent . '        progressDivs.forEach(function(div) {
';
        $buffer .= $indent . '            // Extract the text content from the div
';
        $buffer .= $indent . '            var textContent = div.textContent.trim();
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            // Extract only numbers using regular expression
';
        $buffer .= $indent . '            var numbers = textContent.match(/\\d+/g);
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            // Check if numbers are extracted successfully
';
        $buffer .= $indent . '            if (numbers && numbers.length === 2) {
';
        $buffer .= $indent . '                // Split the value before and after the "/" character
';
        $buffer .= $indent . '                var beforeSlash = numbers[0];
';
        $buffer .= $indent . '                var afterSlash = numbers[1];
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                // Update count-completed-value and count-total-value
';
        $buffer .= $indent . '                var parentDiv = div.closest(\'.section-summary-activities\');
';
        $buffer .= $indent . '                var completedSpan = parentDiv.querySelector(\'.count-completed-value\');
';
        $buffer .= $indent . '                var totalSpan = parentDiv.querySelector(\'.count-total-value\');
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                // Calculate the percentage of completion
';
        $buffer .= $indent . '                var percentage = (beforeSlash / afterSlash) * 100;
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                // Update aria-valuenow attribute
';
        $buffer .= $indent . '                var progressBar = parentDiv.querySelector(\'.rui-progress-bar\');
';
        $buffer .= $indent . '                if (progressBar) {
';
        $buffer .= $indent . '                    progressBar.setAttribute(\'aria-valuenow\', percentage);
';
        $buffer .= $indent . '                    progressBar.style.width = percentage + "%";
';
        $buffer .= $indent . '                }
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '                if (completedSpan && totalSpan) {
';
        $buffer .= $indent . '                    completedSpan.textContent = beforeSlash;
';
        $buffer .= $indent . '                    totalSpan.textContent = afterSlash;
';
        $buffer .= $indent . '                }
';
        $buffer .= $indent . '                
';
        $buffer .= $indent . '            } else {
';
        $buffer .= $indent . '                console.error("Error: Failed to extract numbers from the div with ID:", div.id);
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '        });
';
        $buffer .= $indent . '    </script>
';
        $buffer .= $indent . '    
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>
';
        $value = $context->find('js');
        $buffer .= $this->section6d7a120a112ea41741d31933d58439b3($context, $indent, $value);

        return $buffer;
    }

    private function section074790dc1144afd4e123c57768aa2ba7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'rui--course-with-nav';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'rui--course-with-nav';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2f9abbbc7cfc8a578df65e02c2f006ff(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'show-hidden-drawer';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'show-hidden-drawer';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section79beb5cfa7b89bb67e7da9a67f96d7d7(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'has-sidecourseblocks wrapper-has-blocks';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'has-sidecourseblocks wrapper-has-blocks';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6b403a6a78537640b9e04a931aeb6463(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'content';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'content';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionD8905ccc04d728da18e2b7776a7a7837(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'class="blocks-wrapper d-inline-flex flex-wrap justify-content-between w-100" ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'class="blocks-wrapper d-inline-flex flex-wrap justify-content-between w-100" ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8ce6577f7e0e34d379fdcf89cda2c95e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'wrapper-blocks mx-0';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'wrapper-blocks mx-0';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3cf9bed31f63cb67dd484b57a3ee6100(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="secondary-navigation d-print-none">
                                            {{> core/course-moremenu}}
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="secondary-navigation d-print-none">
';
                if ($partial = $this->mustache->loadPartial('core/course-moremenu')) {
                    $buffer .= $partial->renderInternal($context, $indent . '                                            ');
                }
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section7f819f22d98df6f948b304f54af8ecd5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <section id="cstopbl" data-region="stopbl" class="rui-blocks-area">
                                            {{{ cstopbl }}}
                                        </section>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <section id="cstopbl" data-region="stopbl" class="rui-blocks-area">
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('cstopbl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </section>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionBcac8de8b25b89a0e21e9ff8baa99282(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="my-4 wrapper-xxl">
                                            <section id="ctopbl" data-region="ctopbl" class="rui-blocks-area">
                                                {{{ ctopbl }}}
                                            </section>
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="my-4 wrapper-xxl">
';
                $buffer .= $indent . '                                            <section id="ctopbl" data-region="ctopbl" class="rui-blocks-area">
';
                $buffer .= $indent . '                                                ';
                $value = $this->resolveValue($context->find('ctopbl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                            </section>
';
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section48514a02dd74371334bbe1b5f91da421(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="rui-course-cover my-4" style="background-image: url(\'{{{ output.course_hero }}}\');"></div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="rui-course-cover my-4" style="background-image: url(\'';
                $value = $this->resolveValue($context->findDot('output.course_hero'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '\');"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB89fc4e7badf765ef95ad445a170d38d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    {{#output.course_hero}}
                                        <div class="rui-course-cover my-4" style="background-image: url(\'{{{ output.course_hero }}}\');"></div>
                                    {{/output.course_hero}}
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('output.course_hero');
                $buffer .= $this->section48514a02dd74371334bbe1b5f91da421($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section47d38be224579d1e8081a7bd18f7754f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div class="region_main_settings_menu_proxy"></div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div class="region_main_settings_menu_proxy"></div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFa2eee46a05f032186f00593f6ccf8ae(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                        <div>
                                            <section id="csbottombl" data-region="csbottombl" class="rui-blocks-area">
                                                {{{ csbottombl }}}
                                            </section>
                                        </div>
                                    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                        <div>
';
                $buffer .= $indent . '                                            <section id="csbottombl" data-region="csbottombl" class="rui-blocks-area">
';
                $buffer .= $indent . '                                                ';
                $value = $this->resolveValue($context->find('csbottombl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                            </section>
';
                $buffer .= $indent . '                                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB29cb3bc5750652c6cfbca989c93d05b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                                    <div class="tmpl-course-blocks mt-4 mt-lmd-0">
                                        <section id="sidecourseblocks" data-region="sidecourseblocks" class="rui-blocks-area">
                                            {{{ sidecourseblocks }}}
                                        </section>
                                    </div>
                                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                                    <div class="tmpl-course-blocks mt-4 mt-lmd-0">
';
                $buffer .= $indent . '                                        <section id="sidecourseblocks" data-region="sidecourseblocks" class="rui-blocks-area">
';
                $buffer .= $indent . '                                            ';
                $value = $this->resolveValue($context->find('sidecourseblocks'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                        </section>
';
                $buffer .= $indent . '                                    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6d7a120a112ea41741d31933d58439b3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    M.util.js_pending(\'theme_alpha/loader\');
    require([\'theme_alpha/loader\', \'theme_alpha/drawer\'], function(Loader, Drawer) {
    Drawer.init();
    M.util.js_complete(\'theme_alpha/loader\');
    });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    M.util.js_pending(\'theme_alpha/loader\');
';
                $buffer .= $indent . '    require([\'theme_alpha/loader\', \'theme_alpha/drawer\'], function(Loader, Drawer) {
';
                $buffer .= $indent . '    Drawer.init();
';
                $buffer .= $indent . '    M.util.js_complete(\'theme_alpha/loader\');
';
                $buffer .= $indent . '    });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
