-- Migration: Add user_type column to users table
ALTER TABLE users ADD COLUMN IF NOT EXISTS user_type VARCHAR(32) NOT NULL DEFAULT 'mahasiswa';
