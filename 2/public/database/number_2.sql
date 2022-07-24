INSERT INTO `medical_records` (`id`, `member_id`, `nurse_id`, `type`, `value`, `method`, `diagnosis`, `note`, `mime_type`, `created_at`, `updated_at`) VALUES
(1, 'CXPq9AD0XZoOO', 'CXPq9AD0XZoRR', 'TEMPERATURE', 35.66, 'MANUAL', 'diagnosis', 'ini adalah note', 'text', '2022-07-24 13:40:00', '2022-07-24 13:40:00'),
(2, 'CXPq9AD0XZoOO', 'CXPq9AD0XZoRR', 'BLOODPRESSURE', NULL, 'MANUAL', 'diagnosis', 'ini adalah note', 'text', '2022-07-24 13:42:00', '2022-07-24 13:42:00'),
(3, 'CXPq9AD0XZoOO', 'CXPq9AD0XZoRR', 'SLEEP', NULL, 'MANUAL', 'diagnosis', 'ini adalah note', 'text', '2022-07-24 13:42:00', '2022-07-24 13:42:00');
INSERT INTO `blood_pressures` (`id`, `medical_id`, `systole`, `disatole`, `created_at`, `updated_at`) VALUES
(1, 2, 'systole', 'disatole', '2022-07-24 13:40:00', '2022-07-24 13:40:00');
INSERT INTO `sleeps` (`id`, `medical_id`, `sleepStart`, `sleepEnd`, `deepSleep`, `lightSleep`, `wakeTime`, `created_at`, `updated_at`) VALUES
(1, 3, '07:00:00', '09:00:00', 455, 397, 2, '2022-07-24 13:45:00', '2022-07-24 13:45:00');

