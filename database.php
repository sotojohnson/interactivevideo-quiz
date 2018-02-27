<?php

// The SQL to uninstall this tool
$DATABASE_UNINSTALL = array(
    // Nothing yet.
);

// The SQL to create the tables if they don't exist
$DATABASE_INSTALL = array(
    array( "{$CFG->dbprefix}iv_video",
        "create table {$CFG->dbprefix}iv_video (
    video_id    INTEGER NOT NULL AUTO_INCREMENT,
    link_id     INTEGER NOT NULL,
    context_id  INTEGER NULL,
    user_id     INTEGER NULL,
    video_url   VARCHAR(4000),
    video_type  INTEGER NOT NULL,
    
    UNIQUE(link_id, context_id),
    PRIMARY KEY(video_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8"),
    array( "{$CFG->dbprefix}iv_question",
        "create table {$CFG->dbprefix}iv_question (
    question_id   INTEGER NOT NULL AUTO_INCREMENT,
    video_id      INTEGER NOT NULL,
    q_time        INTEGER NOT NULL,
    q_text        TEXT NULL,
    correct_fb    TEXT NULL,
    incorrect_fb  TEXT NULL,
    
    CONSTRAINT `{$CFG->dbprefix}iv_question_ibfk_1`
        FOREIGN KEY (`video_id`)
        REFERENCES `{$CFG->dbprefix}iv_video` (`video_id`)
        ON DELETE CASCADE,
    
    PRIMARY KEY(question_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8"),
    array( "{$CFG->dbprefix}iv_answer",
        "create table {$CFG->dbprefix}iv_answer (
    answer_id     INTEGER NOT NULL AUTO_INCREMENT,
    question_id   INTEGER NOT NULL,
    is_correct    BOOL NOT NULL,
    a_text        TEXT NULL,
    
    CONSTRAINT `{$CFG->dbprefix}iv_answer_ibfk_1`
        FOREIGN KEY (`question_id`)
        REFERENCES `{$CFG->dbprefix}iv_question` (`question_id`)
        ON DELETE CASCADE,

    PRIMARY KEY(answer_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8"),
    array( "{$CFG->dbprefix}iv_response",
        "create table {$CFG->dbprefix}iv_response (
    response_id   INTEGER NOT NULL AUTO_INCREMENT,
    user_id       INTEGER NOT NULL,
    question_id   INTEGER NOT NULL,
    answer_id     INTEGER NOT NULL,

    CONSTRAINT `{$CFG->dbprefix}iv_response_ibfk_1`
        FOREIGN KEY (`question_id`)
        REFERENCES `{$CFG->dbprefix}iv_question` (`question_id`)
        ON DELETE CASCADE,
        
    CONSTRAINT `{$CFG->dbprefix}iv_response_ibfk_2`
        FOREIGN KEY (`answer_id`)
        REFERENCES `{$CFG->dbprefix}iv_answer` (`answer_id`)
        ON DELETE CASCADE,
        
    PRIMARY KEY(response_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8")
);
