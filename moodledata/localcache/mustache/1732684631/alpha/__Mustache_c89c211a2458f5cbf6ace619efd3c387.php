<?php

class __Mustache_c89c211a2458f5cbf6ace619efd3c387 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="nav-drawer" data-region="drawer" class="d-block moodle-has-zindex ';
        $value = $context->find('topbaradminbtnon');
        if (empty($value)) {
            
            $buffer .= 'rui-topbar-adminbtn';
        }
        $buffer .= ' ';
        $value = $context->find('topbaradminbtnon');
        if (empty($value)) {
            
            $value = $context->findDot('output.adminheaderlink');
            $buffer .= $this->sectionC113b8c4c1550682d3a03c7ee40923ee($context, $indent, $value);
        }
        $buffer .= ' ';
        $value = $context->find('navdraweropen');
        if (empty($value)) {
            
            $buffer .= 'closed';
        }
        $buffer .= '" aria-hidden="';
        $value = $context->find('navdraweropen');
        $buffer .= $this->section3d743337d1ee557b470226701b73da47($context, $indent, $value);
        $value = $context->find('navdraweropen');
        if (empty($value)) {
            
            $buffer .= 'true';
        }
        $buffer .= '" tabindex="-1">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <div class="nav-drawer-container ';
        $value = $context->find('mycoursesontop');
        $buffer .= $this->sectionFc4b87317536ee6a85550edbd97f447e($context, $indent, $value);
        $buffer .= ' ';
        $value = $context->find('mycoursesontop');
        if (empty($value)) {
            
            $buffer .= 'drawer-layout--2';
        }
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $value = $context->find('isnotloggedin');
        if (empty($value)) {
            
            $buffer .= $indent . '            ';
            $value = $this->resolveValue($context->findDot('output.search_box'), $context);
            $buffer .= ($value === null ? '' : $value);
            $buffer .= '
';
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->find('sidebartb'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $value = $context->find('customsidebarlogo');
        $buffer .= $this->section281c5b30c6d42a39b2f06e9a82134346($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('showmycoursesbox');
        $buffer .= $this->section8931232ba1cbdfb7837a0384cbcbb7b5($context, $indent, $value);
        $value = $context->find('customstcontent');
        $buffer .= $this->section60dd414050b241c31e4c7b3b98630ad6($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->findDot('output.mainsidebarmenu');
        $buffer .= $this->section87149914b40e40ad7c2ad909885e9791($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('iscoursepage');
        $buffer .= $this->section6d0a60c5ad3bb3756f656789a0c49b52($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('customsmcontent');
        $buffer .= $this->section4e9e79d926b8731024fb2a4c77427e42($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('customsfcontent');
        $buffer .= $this->sectionE9d1858497d6504fc62bcd40195c2be0($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->find('sidebarbb'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '
';
        $value = $context->find('topbaradminbtnon');
        if (empty($value)) {
            
            $value = $context->findDot('output.adminheaderlink');
            $buffer .= $this->section82830ab2975eccbc05b8c8451f7488fc($context, $indent, $value);
        }
        $buffer .= $indent . '</div>';

        return $buffer;
    }

    private function sectionC113b8c4c1550682d3a03c7ee40923ee(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'nav-drawer--admin';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'nav-drawer--admin';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3d743337d1ee557b470226701b73da47(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'false';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'false';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFc4b87317536ee6a85550edbd97f447e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'drawer-layout--1';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'drawer-layout--1';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9f02bdab39bdb326c592eb1133254d23(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'dark-mode-logo';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'dark-mode-logo';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section3c1e3782c7720af55f68007fcc57358e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<img src="{{customsidebardmlogo}}" alt="{{sitename}}" class="rui-custom-dmlogo img-fluid" />';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<img src="';
                $value = $this->resolveValue($context->find('customsidebardmlogo'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" alt="';
                $value = $this->resolveValue($context->find('sitename'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="rui-custom-dmlogo img-fluid" />';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section281c5b30c6d42a39b2f06e9a82134346(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-drawer-logo {{#customsidebardmlogo}}dark-mode-logo{{/customsidebardmlogo}}">
                <img src="{{customsidebarlogo}}" alt="{{sitename}}" class="rui-custom-logo img-fluid" />
                {{#customsidebardmlogo}}<img src="{{customsidebardmlogo}}" alt="{{sitename}}" class="rui-custom-dmlogo img-fluid" />{{/customsidebardmlogo}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-drawer-logo ';
                $value = $context->find('customsidebardmlogo');
                $buffer .= $this->section9f02bdab39bdb326c592eb1133254d23($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '                <img src="';
                $value = $this->resolveValue($context->find('customsidebarlogo'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" alt="';
                $value = $this->resolveValue($context->find('sitename'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="rui-custom-logo img-fluid" />
';
                $buffer .= $indent . '                ';
                $value = $context->find('customsidebardmlogo');
                $buffer .= $this->section3c1e3782c7720af55f68007fcc57358e($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section14c724f5a6859d4cc56d9befdffaeac5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'show';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'show';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section778916cb3e377f0db0252fab9341c0c1(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'search, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'search, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section9218fef1b34d87babe475c02c4d55249(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'checked=""';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'checked=""';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section74443db2b03795b618d4b06db1447744(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                        <div class="mycourses-filter mycourses-hidden-filter-checkbox-container">
                            <div class="custom-control custom-control--xs custom-switch my-2 mx-1 d-flex justify-content-between">
                                <input id="myCoursesHidden" data-preference="mycourses-hidden-on" aria-checked="false" type="checkbox" name="navdrawer_hidden_checkbox" onchange="myCoursesList()" class="custom-control-input custom-control-input--xs mycourses-hidden-filter-checkbox" value="1" size="" {{#mycourseshiddenon}}checked=""{{/mycourseshiddenon}}>
                                <label class="custom-control-label" for="myCoursesHidden">
                                    {{{stringshowhidden}}}
                                </label>
                            </div>
                        </div>
                        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                        <div class="mycourses-filter mycourses-hidden-filter-checkbox-container">
';
                $buffer .= $indent . '                            <div class="custom-control custom-control--xs custom-switch my-2 mx-1 d-flex justify-content-between">
';
                $buffer .= $indent . '                                <input id="myCoursesHidden" data-preference="mycourses-hidden-on" aria-checked="false" type="checkbox" name="navdrawer_hidden_checkbox" onchange="myCoursesList()" class="custom-control-input custom-control-input--xs mycourses-hidden-filter-checkbox" value="1" size="" ';
                $value = $context->find('mycourseshiddenon');
                $buffer .= $this->section9218fef1b34d87babe475c02c4d55249($context, $indent, $value);
                $buffer .= '>
';
                $buffer .= $indent . '                                <label class="custom-control-label" for="myCoursesHidden">
';
                $buffer .= $indent . '                                    ';
                $value = $this->resolveValue($context->find('stringshowhidden'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                </label>
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section8931232ba1cbdfb7837a0384cbcbb7b5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-sidebar-mycourses">
                <button id="myCoursesBtn" class="rui-sidebar-abtn rui-sidebar-nav-item-link" type="button" data-preference="mycourses-on" data-toggle="collapse" data-target="#myCoursesBox" aria-checked="false" aria-expanded="false" aria-controls="myCoursesBox">
                    <span class="rui-sidebar-nav-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.75 7.75C10.75 6.64543 11.6454 5.75 12.75 5.75H17.25C18.3546 5.75 19.25 6.64543 19.25 7.75V16.25C19.25 17.3546 18.3546 18.25 17.25 18.25H12.75C11.6454 18.25 10.75 17.3546 10.75 16.25V7.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10.25 8.5C10.6642 8.5 11 8.16421 11 7.75C11 7.33579 10.6642 7 10.25 7V8.5ZM10.25 18C10.6642 18 11 17.6642 11 17.25C11 16.8358 10.6642 16.5 10.25 16.5V18ZM9.75 8.5H10.25V7H9.75V8.5ZM10.25 16.5H9.75V18H10.25V16.5ZM8.5 15.25V9.75H7V15.25H8.5ZM9.75 16.5C9.05964 16.5 8.5 15.9404 8.5 15.25H7C7 16.7688 8.23122 18 9.75 18V16.5ZM9.75 7C8.23122 7 7 8.23122 7 9.75H8.5C8.5 9.05964 9.05964 8.5 9.75 8.5V7Z" fill="currentColor"></path>
                            <path d="M7.25 9.5C7.66421 9.5 8 9.16421 8 8.75C8 8.33579 7.66421 8 7.25 8V9.5ZM7.25 17C7.66421 17 8 16.6642 8 16.25C8 15.8358 7.66421 15.5 7.25 15.5V17ZM6.75 9.5H7.25V8H6.75V9.5ZM7.25 15.5H6.75V17H7.25V15.5ZM5.5 14.25V10.75H4V14.25H5.5ZM6.75 15.5C6.05964 15.5 5.5 14.9404 5.5 14.25H4C4 15.7688 5.23122 17 6.75 17V15.5ZM6.75 8C5.23122 8 4 9.23122 4 10.75H5.5C5.5 10.0596 6.05964 9.5 6.75 9.5V8Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <span class="rui-sidebar-nav-text">{{{ output.alpha_mycourses_heading_text }}}</span>
                </button>
                <div class="collapse {{#mycourseson}}show{{/mycourseson}}" id="myCoursesBox">

                    <div class="form-inline simplesearchform">
                        <div class="search-input-group d-inline-flex justify-content-between mt-1 w-100" role="search">
                            <span class="search-input-icon">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.25 19.25L15.5 15.5M4.75 11C4.75 7.54822 7.54822 4.75 11 4.75C14.4518 4.75 17.25 7.54822 17.25 11C17.25 14.4518 14.4518 17.25 11 17.25C7.54822 17.25 4.75 14.4518 4.75 11Z"></path>
                                </svg>
                            </span>
                            <input type="text" id="myCoursesListSearch" onkeyup="myCoursesList()" class="search-input" placeholder="{{#str}}search, core{{/str}}" aria-label="{{#str}}search, core{{/str}}" />
                        </div>
                    </div>

                    <div class="rui-sidebar-filter">
                        {{#output.displayfilterhidden}}
                        <div class="mycourses-filter mycourses-hidden-filter-checkbox-container">
                            <div class="custom-control custom-control--xs custom-switch my-2 mx-1 d-flex justify-content-between">
                                <input id="myCoursesHidden" data-preference="mycourses-hidden-on" aria-checked="false" type="checkbox" name="navdrawer_hidden_checkbox" onchange="myCoursesList()" class="custom-control-input custom-control-input--xs mycourses-hidden-filter-checkbox" value="1" size="" {{#mycourseshiddenon}}checked=""{{/mycourseshiddenon}}>
                                <label class="custom-control-label" for="myCoursesHidden">
                                    {{{stringshowhidden}}}
                                </label>
                            </div>
                        </div>
                        {{/output.displayfilterhidden}}
           
                        <div class="mycourses-filter mycourses-inprogress-filter-checkbox-container">
                            <div class="custom-control custom-control--xs custom-switch my-2 mx-1 d-flex justify-content-between">
                                <input id="myCoursesInprogress" data-preference="mycourses-inprogress-on" aria-checked="false" type="checkbox" name="navdrawer_inprogress_checkbox" onchange="myCoursesList()" class="custom-control-input custom-control-input--xs mycourses-inprogress-filter-checkbox" value="1" {{#mycoursesinprogresson}}checked=""{{/mycoursesinprogresson}} size="">
                                <label class="custom-control-label" for="myCoursesInprogress">
                                    {{{stringshowonlyinprogress}}}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="rui-course-wrapper">
                        {{{ output.alpha_mycourses }}}
                    </div>

                    {{^hidedetails}}
                    {{{ output.alpha_mycourses_heading }}}
                    {{/hidedetails}}
                    {{{ output.alpha_allcourseslink }}}
                </div>
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-sidebar-mycourses">
';
                $buffer .= $indent . '                <button id="myCoursesBtn" class="rui-sidebar-abtn rui-sidebar-nav-item-link" type="button" data-preference="mycourses-on" data-toggle="collapse" data-target="#myCoursesBox" aria-checked="false" aria-expanded="false" aria-controls="myCoursesBox">
';
                $buffer .= $indent . '                    <span class="rui-sidebar-nav-icon">
';
                $buffer .= $indent . '                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
';
                $buffer .= $indent . '                            <path d="M10.75 7.75C10.75 6.64543 11.6454 5.75 12.75 5.75H17.25C18.3546 5.75 19.25 6.64543 19.25 7.75V16.25C19.25 17.3546 18.3546 18.25 17.25 18.25H12.75C11.6454 18.25 10.75 17.3546 10.75 16.25V7.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
';
                $buffer .= $indent . '                            <path d="M10.25 8.5C10.6642 8.5 11 8.16421 11 7.75C11 7.33579 10.6642 7 10.25 7V8.5ZM10.25 18C10.6642 18 11 17.6642 11 17.25C11 16.8358 10.6642 16.5 10.25 16.5V18ZM9.75 8.5H10.25V7H9.75V8.5ZM10.25 16.5H9.75V18H10.25V16.5ZM8.5 15.25V9.75H7V15.25H8.5ZM9.75 16.5C9.05964 16.5 8.5 15.9404 8.5 15.25H7C7 16.7688 8.23122 18 9.75 18V16.5ZM9.75 7C8.23122 7 7 8.23122 7 9.75H8.5C8.5 9.05964 9.05964 8.5 9.75 8.5V7Z" fill="currentColor"></path>
';
                $buffer .= $indent . '                            <path d="M7.25 9.5C7.66421 9.5 8 9.16421 8 8.75C8 8.33579 7.66421 8 7.25 8V9.5ZM7.25 17C7.66421 17 8 16.6642 8 16.25C8 15.8358 7.66421 15.5 7.25 15.5V17ZM6.75 9.5H7.25V8H6.75V9.5ZM7.25 15.5H6.75V17H7.25V15.5ZM5.5 14.25V10.75H4V14.25H5.5ZM6.75 15.5C6.05964 15.5 5.5 14.9404 5.5 14.25H4C4 15.7688 5.23122 17 6.75 17V15.5ZM6.75 8C5.23122 8 4 9.23122 4 10.75H5.5C5.5 10.0596 6.05964 9.5 6.75 9.5V8Z" fill="currentColor"></path>
';
                $buffer .= $indent . '                        </svg>
';
                $buffer .= $indent . '                    </span>
';
                $buffer .= $indent . '                    <span class="rui-sidebar-nav-text">';
                $value = $this->resolveValue($context->findDot('output.alpha_mycourses_heading_text'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '                </button>
';
                $buffer .= $indent . '                <div class="collapse ';
                $value = $context->find('mycourseson');
                $buffer .= $this->section14c724f5a6859d4cc56d9befdffaeac5($context, $indent, $value);
                $buffer .= '" id="myCoursesBox">
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                    <div class="form-inline simplesearchform">
';
                $buffer .= $indent . '                        <div class="search-input-group d-inline-flex justify-content-between mt-1 w-100" role="search">
';
                $buffer .= $indent . '                            <span class="search-input-icon">
';
                $buffer .= $indent . '                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24">
';
                $buffer .= $indent . '                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.25 19.25L15.5 15.5M4.75 11C4.75 7.54822 7.54822 4.75 11 4.75C14.4518 4.75 17.25 7.54822 17.25 11C17.25 14.4518 14.4518 17.25 11 17.25C7.54822 17.25 4.75 14.4518 4.75 11Z"></path>
';
                $buffer .= $indent . '                                </svg>
';
                $buffer .= $indent . '                            </span>
';
                $buffer .= $indent . '                            <input type="text" id="myCoursesListSearch" onkeyup="myCoursesList()" class="search-input" placeholder="';
                $value = $context->find('str');
                $buffer .= $this->section778916cb3e377f0db0252fab9341c0c1($context, $indent, $value);
                $buffer .= '" aria-label="';
                $value = $context->find('str');
                $buffer .= $this->section778916cb3e377f0db0252fab9341c0c1($context, $indent, $value);
                $buffer .= '" />
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                    <div class="rui-sidebar-filter">
';
                $value = $context->findDot('output.displayfilterhidden');
                $buffer .= $this->section74443db2b03795b618d4b06db1447744($context, $indent, $value);
                $buffer .= $indent . '           
';
                $buffer .= $indent . '                        <div class="mycourses-filter mycourses-inprogress-filter-checkbox-container">
';
                $buffer .= $indent . '                            <div class="custom-control custom-control--xs custom-switch my-2 mx-1 d-flex justify-content-between">
';
                $buffer .= $indent . '                                <input id="myCoursesInprogress" data-preference="mycourses-inprogress-on" aria-checked="false" type="checkbox" name="navdrawer_inprogress_checkbox" onchange="myCoursesList()" class="custom-control-input custom-control-input--xs mycourses-inprogress-filter-checkbox" value="1" ';
                $value = $context->find('mycoursesinprogresson');
                $buffer .= $this->section9218fef1b34d87babe475c02c4d55249($context, $indent, $value);
                $buffer .= ' size="">
';
                $buffer .= $indent . '                                <label class="custom-control-label" for="myCoursesInprogress">
';
                $buffer .= $indent . '                                    ';
                $value = $this->resolveValue($context->find('stringshowonlyinprogress'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                                </label>
';
                $buffer .= $indent . '                            </div>
';
                $buffer .= $indent . '                        </div>
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '                    <div class="rui-course-wrapper">
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->findDot('output.alpha_mycourses'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '
';
                $value = $context->find('hidedetails');
                if (empty($value)) {
                    
                    $buffer .= $indent . '                    ';
                    $value = $this->resolveValue($context->findDot('output.alpha_mycourses_heading'), $context);
                    $buffer .= ($value === null ? '' : $value);
                    $buffer .= '
';
                }
                $buffer .= $indent . '                    ';
                $value = $this->resolveValue($context->findDot('output.alpha_allcourseslink'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section60dd414050b241c31e4c7b3b98630ad6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-customstcontent rui-custom-sidebar-content my-3">
                {{{customstcontent}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-customstcontent rui-custom-sidebar-content my-3">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('customstcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section87149914b40e40ad7c2ad909885e9791(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <ul class="rui-flatnavigation rui-flatnavigation-box {{^customsidebarlogo}}mt-2{{/customsidebarlogo}}">
                {{{output.mainsidebarmenu}}}
                {{{customnavitems}}}
            </ul>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <ul class="rui-flatnavigation rui-flatnavigation-box ';
                $value = $context->find('customsidebarlogo');
                if (empty($value)) {
                    
                    $buffer .= 'mt-2';
                }
                $buffer .= '">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->findDot('output.mainsidebarmenu'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('customnavitems'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </ul>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5eb52902e274514e9130c5c7522be66f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
                <div class="rui-drawer-course-nav">
                    <ul class="rui-flatnavigation rui-flatnavigation-sm">
                        {{{ output.courseheadermenu }}}
                    </ul>
                </div>
                ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '                <div class="rui-drawer-course-nav">
';
                $buffer .= $indent . '                    <ul class="rui-flatnavigation rui-flatnavigation-sm">
';
                $buffer .= $indent . '                        ';
                $value = $this->resolveValue($context->findDot('output.courseheadermenu'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </ul>
';
                $buffer .= $indent . '                </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6d0a60c5ad3bb3756f656789a0c49b52(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{# output.courseheadermenu }}
                <div class="rui-drawer-course-nav">
                    <ul class="rui-flatnavigation rui-flatnavigation-sm">
                        {{{ output.courseheadermenu }}}
                    </ul>
                </div>
                {{/ output.courseheadermenu }}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->findDot('output.courseheadermenu');
                $buffer .= $this->section5eb52902e274514e9130c5c7522be66f($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4e9e79d926b8731024fb2a4c77427e42(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-customsmcontent rui-custom-sidebar-content">
                {{{customsmcontent}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-customsmcontent rui-custom-sidebar-content">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('customsmcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE9d1858497d6504fc62bcd40195c2be0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-customsfcontent rui-custom-sidebar-content my-2">
                {{{customsfcontent}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-customsfcontent rui-custom-sidebar-content my-2">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->find('customsfcontent'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section82830ab2975eccbc05b8c8451f7488fc(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            <div class="rui-drawer-footer">
                {{{output.adminheaderlink}}}
            </div>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '            <div class="rui-drawer-footer">
';
                $buffer .= $indent . '                ';
                $value = $this->resolveValue($context->findDot('output.adminheaderlink'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
